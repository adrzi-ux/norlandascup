#!/bin/bash
# validate-norlandascup.sh
# Validation end-to-end post-déploiement. Calqué sur l'esprit de validate-cam-site.sh du
# skill cam-site-builder-wa (mémoire feedback_astro_vps_deploy patterns réseau SEO).
#
# Usage :
#   bash validate-norlandascup.sh
#
# Optionnel :
#   DOMAIN=norlandascup.fr bash validate-norlandascup.sh
#
# Sortie : exit 0 si tout passe, exit 1 sur au moins un check critique en erreur.

DOMAIN="${DOMAIN:-www.norlandascup.fr}"
G='\033[0;32m'; Y='\033[1;33m'; R='\033[0;31m'; N='\033[0m'
ok()   { echo -e "${G}✓${N} $1"; }
warn() { echo -e "${Y}⚠${N} $1"; }
err()  { echo -e "${R}✗${N} $1"; FAIL=1; }

FAIL=0
echo "Validation de https://$DOMAIN"
echo

# 1. Routes 200 (URLs Google indexées prioritaires + nouvelles pages)
echo "== 1. Routes 200 =="
urls=(
    "/"
    "/magazine/"
    "/calendrier-regates-normandie/"
    "/spots-de-voile-normandie/"
    "/materiel-voile/"
    "/la-norlandas-cup/"
    "/les-equipages/"
    "/format-sportif-2018/"
    "/equipage/cane-normandie-developpement/"
    "/masselin-sogea/"
    "/super-u-2/"
    "/l2-architectes/"
    "/interview-economique/"
    "/interview-antoine/"
    "/a-propos/"
    "/contact/"
    "/mentions-legales/"
    "/politique-de-confidentialite/"
)
for url in "${urls[@]}"; do
    code=$(curl -skI -o /dev/null -w "%{http_code}" "https://$DOMAIN$url")
    if [ "$code" = "200" ]; then
        ok "$url, 200"
    else
        err "$url, HTTP $code"
    fi
done

# 2. Sitemap et robots
echo
echo "== 2. Sitemap et robots =="
for path in /sitemap_index.xml /sitemap.xml /robots.txt; do
    code=$(curl -skI -o /dev/null -w "%{http_code}" "https://$DOMAIN$path")
    [ "$code" = "200" ] && ok "$path, 200" || warn "$path, HTTP $code (vérifier Rank Math ou autre plugin SEO)"
done

# 3. Canonical absolu et og:url
echo
echo "== 3. Canonical et og:url =="
HOME_HTML=$(curl -sk "https://$DOMAIN/")
if echo "$HOME_HTML" | grep -q "rel=\"canonical\" href=\"https://"; then
    ok "Canonical absolu présent sur la home"
else
    err "Canonical absolu manquant sur la home"
fi
if echo "$HOME_HTML" | grep -q "og:url\" content=\"https://"; then
    ok "og:url absolu présent sur la home"
else
    warn "og:url absolu manquant sur la home (vérifier le plugin SEO)"
fi

# 4. Standards skill cam : zéro cadratin, zéro mailto visible
echo
echo "== 4. Standards typo (0 cadratin, 0 mailto) =="
for url in / /la-norlandas-cup/ /magazine/ /les-equipages/; do
    page=$(curl -sk "https://$DOMAIN$url")
    if echo "$page" | grep -qP '[—–]'; then
        err "$url, tiret cadratin détecté"
    else
        ok "$url, 0 cadratin"
    fi
    if echo "$page" | grep -qi 'mailto:'; then
        err "$url, mailto détecté"
    else
        ok "$url, 0 mailto"
    fi
done

# 5. JSON-LD (au moins une mention Organization ou NewsArticle)
echo
echo "== 5. JSON-LD =="
if echo "$HOME_HTML" | grep -q '"@type":"Organization"\|"@type":"WebSite"\|"@type":"NewsMediaOrganization"'; then
    ok "JSON-LD Organization présent sur la home"
else
    warn "JSON-LD Organization manquant (vérifier Rank Math Schema)"
fi

# 6. Non-régression : autres sites du VPS (boutique-catea + brasserieautandem)
echo
echo "== 6. Non-régression autres sites du VPS =="
for site in www.boutique-catea.fr www.brasserieautandem.fr; do
    code=$(curl -skI -o /dev/null -w "%{http_code}" "https://$site/")
    if [ "$code" = "200" ] || [ "$code" = "301" ] || [ "$code" = "302" ]; then
        ok "$site, $code (OK)"
    else
        err "$site, $code (RÉGRESSION : un autre site du VPS est cassé)"
    fi
done

# 7. WWW vs apex redirect
echo
echo "== 7. Apex vers www, redirection 301 =="
code=$(curl -skI -o /dev/null -w "%{http_code}" "https://norlandascup.fr/")
if [ "$code" = "301" ] || [ "$code" = "308" ]; then
    ok "Apex norlandascup.fr, 301 vers www (canonique)"
else
    warn "Apex norlandascup.fr, $code (attendu 301 vers www)"
fi

# 8. Verdict
echo
if [ $FAIL -eq 0 ]; then
    ok "Validation passée. Site prêt pour soumission GSC + Bing."
    exit 0
else
    err "Validation en échec. Corriger les points ci-dessus avant le go-live."
    exit 1
fi
