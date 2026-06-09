#!/bin/bash
# install-pages.sh
# Crée toutes les pages WP nécessaires pour norlandascup et leur assigne le bon template.
# À exécuter sur le serveur WP, dans le dossier WordPress, avec wp-cli installé.
#
# Usage (depuis /var/www/norlandascup) :
#   bash wp-content/themes/norlandascup-child/install-pages.sh
#
# Ou via SSH :
#   ssh -i ~/.ssh/<cle> root@<VPS_IP> "cd /var/www/norlandascup && bash wp-content/themes/norlandascup-child/install-pages.sh"
#
# Prérequis :
#   - WordPress 6.4+ installé et configuré
#   - wp-cli installé (wp --info)
#   - Theme parent Kadence installé
#   - Theme child norlandascup-child uploadé et activé
#   - Plugin Permalink Manager Pro installé (pour les slugs racines /masselin-sogea/ etc.)

set -e

# Couleurs sortie
G='\033[0;32m'; Y='\033[1;33m'; R='\033[0;31m'; N='\033[0m'

ok()    { echo -e "${G}✓${N} $1"; }
warn()  { echo -e "${Y}⚠${N} $1"; }
err()   { echo -e "${R}✗${N} $1"; }

# Vérifications préalables
command -v wp >/dev/null 2>&1 || { err "wp-cli non installé. Voir https://wp-cli.org"; exit 1; }
wp core is-installed --quiet || { err "WordPress n'est pas installé dans ce dossier."; exit 1; }

ACTIVE_THEME=$(wp theme list --status=active --field=name)
if [ "$ACTIVE_THEME" != "norlandascup-child" ]; then
    warn "Theme actif : $ACTIVE_THEME (attendu : norlandascup-child). Activer le child theme avant de continuer ? [Y/n]"
    read -r answer
    [ "$answer" = "n" ] || wp theme activate norlandascup-child
fi

ok "WordPress + wp-cli OK"

# Permaliens : structure /%postname%/ pour matcher les slugs Google indexés
wp option update permalink_structure '/%postname%/' --quiet
ok "Permaliens : /%postname%/"

# Reading : front-page statique
wp option update show_on_front 'page' --quiet

# Helper : créer une page si elle n'existe pas, sinon update
ensure_page() {
    local slug="$1"
    local title="$2"
    local template="$3"

    local existing
    existing=$(wp post list --post_type=page --name="$slug" --field=ID --posts_per_page=1)

    if [ -n "$existing" ]; then
        wp post update "$existing" --post_title="$title" --quiet
        wp post meta update "$existing" _wp_page_template "$template" --quiet
        ok "Page mise à jour : /$slug/ (ID $existing, template $template)"
    else
        local id
        id=$(wp post create --post_type=page --post_status=publish \
            --post_title="$title" --post_name="$slug" \
            --page_template="$template" --porcelain)
        ok "Page créée : /$slug/ (ID $id, template $template)"
    fi
}

# Helper : créer une page racine (slug à la racine, hors /equipage/...)
ensure_root_page() {
    ensure_page "$1" "$2" "$3"
    warn "Slug racine $1 : penser à régler via Permalink Manager Pro si conflict de structure."
}

# 1. Front page (home)
ensure_page "accueil" "Norlanda's Cup, magazine de voile en Normandie côtière" "default"
HOME_ID=$(wp post list --post_type=page --name=accueil --field=ID --posts_per_page=1)
wp option update page_on_front "$HOME_ID" --quiet
ok "Front page configurée (ID $HOME_ID)"

# 2. Pages magazine vivante
ensure_page "magazine"                       "Le magazine de la voile en Normandie côtière"   "page-magazine.php"
ensure_page "calendrier-regates-normandie"   "Calendrier des régates de Normandie côtière"     "page-calendrier.php"
ensure_page "spots-de-voile-normandie"       "Spots de voile en Normandie côtière"             "page-spots.php"
ensure_page "materiel-voile"                 "Le matériel pour la voile côtière"               "page-materiel.php"

# 3. Pages archive Norlanda's Cup (URLs Google indexées prioritaires)
ensure_page "la-norlandas-cup"               "Norlanda's Cup, la régate inter-entreprises de Caen" "page-la-norlandas-cup.php"
ensure_page "les-equipages"                  "Les équipages de la Norlanda's Cup, 2010 à 2018"  "page-les-equipages.php"
ensure_page "format-sportif-2018"            "Format sportif 2018, le règlement de la dernière édition" "page-format-sportif-2018.php"

# 4. Interviews archive (URLs Google indexées)
ensure_page "interview-economique"           "Interview Dominique GOUTTE"                       "page-template-interview.php"
ensure_page "interview-antoine"              "Interview Antoine DE GOUVILLE"                    "page-template-interview.php"

# 5. Fiches équipage (URL Google indexée préfixée /equipage/)
ensure_page "equipage/cane-normandie-developpement" "Cane Normandie Développement"             "page-equipage.php"

# 6. Fiches équipage à slug racine (URL Google indexée sans préfixe, à finaliser via Permalink Manager)
ensure_root_page "masselin-sogea"           "Masselin Tertiaire SOGÉA"                         "page-equipage.php"
ensure_root_page "super-u-2"                "Super U Hérouville Saint-Clair"                   "page-equipage.php"
ensure_root_page "l2-architectes"           "L2 Architectes"                                   "page-equipage.php"

# 7. Pages institutionnelles
ensure_page "a-propos"                       "Le magazine, sa ligne et son équipe"             "page-a-propos.php"
ensure_page "contact"                        "Nous contacter"                                  "page-contact.php"
ensure_page "mentions-legales"               "Mentions légales"                                "default"
ensure_page "politique-de-confidentialite"   "Politique de confidentialité"                    "default"

# Menus
if ! wp menu list --field=slug | grep -q "primary"; then
    wp menu create "Navigation principale" --quiet
    ok "Menu Navigation principale créé"
fi
PRIMARY_MENU_ID=$(wp menu list --field=term_id --fields=term_id,slug | head -1)
wp menu location assign primary "$PRIMARY_MENU_ID" --quiet || true

# Vider le cache si plugin présent
wp cache flush --quiet 2>/dev/null || true
wp super-cache flush --quiet 2>/dev/null || true

ok "Installation terminée."
echo
warn "ACTIONS MANUELLES requises côté admin WP :"
warn "  1. Permalink Manager Pro : configurer les slugs racines /masselin-sogea/, /super-u-2/, /l2-architectes/"
warn "     pour qu'ils restent à la racine, pas en sous-page (URLs Google indexées à préserver)"
warn "  2. Régler les redirections 301 :"
warn "     - http://www.norlandascup.fr/* vers https://norlandascup.fr/*  (server side via Nginx)"
warn "     - http://norlandascup.fr/wp-content/uploads/*/61015716_*.jpg vers /  (image cassée à rediriger)"
warn "  3. Rank Math SEO : connecter à Google Search Console + Bing Webmaster"
warn "  4. Activer Contact Form 7 ou WPForms, créer un formulaire avec les champs"
warn "     (nom, email, sujet en select, message, RGPD), puis coller son shortcode dans la page /contact/"
warn "  5. Wordfence et UpdraftPlus à configurer"
warn "  6. Vérifier les 9 URLs Google indexées (200 OK) :"
warn "     curl -sI https://www.norlandascup.fr/[la-norlandas-cup,format-sportif-2018,les-equipages,equipage/cane-normandie-developpement,masselin-sogea,super-u-2,l2-architectes,interview-economique,interview-antoine]/"
echo
ok "Voir wp-theme-child/README.md pour le détail post-install."
