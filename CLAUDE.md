# CLAUDE.md — norlandascup.fr

## Statut
✓ **ACHETÉ le 2026-05-19**, premier achat du projet remontage expired.
✓ **ÉTAPE 0 validée 2026-06-08** : GSC Manual Actions / Security verts (snapshot 2026-05-20), GSC Performance 16 mois à plat depuis ajout property, Ahrefs trafic 0 (pas de chute brutale détectable), Google `site:norlandascup.fr` = **9 URLs encore indexées** (jus reconnu), INPI marques vérifié OK, Wayback clean.

## Contexte
- **Activité originale** : "Norlanda's Cup, Régates de la presqu'île" — régate **inter-entreprises en J/80 monotype**, format **Match Race**, organisée chaque mois de mai à **Caen** (baie de Seine, presqu'île de Caen). Données reconstituées depuis Wayback 2026-06-08.
- **Dernière édition** : 9e édition, 28 mai - 1er juin 2018. **Annuelle** depuis 2010 (1re : 8 équipages → 9e : 32 équipages, 137 matchs en 2017).
- **Format détaillé** : 32 équipages répartis en 4 groupes de 8 (A, B, C, D), phases de poules, puis demi-finales et finale le vendredi. 5 à 7 jours. Inscrite dans la Quinzaine du nautisme.
- **Organisateurs historiques** (NE PAS citer sur le site live, cf. mémoire `feedback_remontage_zero_reference_anciens_gerants`) : Caen Yacht Club, Synergia, Exaequo Communication.
- **Niche cible rebuild** : Voile / Match Race / Régates inter-entreprises Normandie + tourisme nautique côte normande
- **Angle narratif retenu (décision 2026-06-08)** : **Portail/magazine régates Normandie + section archive** de l'événement historique (statut neutre, pas de relance fictive). Équipe éditoriale fictive (rédaction actuelle uniquement, PAS de fondateurs fictifs).

## Métriques (au moment de l'achat)
| Source | Métrique | Valeur |
|---|---|---|
| Majestic | TF / RD / DoFollow RD | 16 / 33 / 16 |
| Ahrefs | AR / RD Fol / Diversité | 34.6M / 39 / 0.67 |
| Ahrefs | Trafic organique | 0 |

## Backlinks d'autorité à préserver (issue analyse Site Explorer)

| Domaine | DR | Trafic | Pourquoi qualité |
|---|---|---|---|
| **calvados.fr** | 71 | 13 813 | DÉPARTEMENT du Calvados — institution publique officielle |
| **tendanceouest.com** | 70 | 58 932 | Média régional Normandie (radio + portail info) |
| **caennormandiedeveloppement.fr** | 42 | 338 | Caen Normandie Développement — agence officielle dev |
| exaequo-communication.fr | 30 | 72 | Agence comm (faible mais légitime) |

→ **Objectif rebuild : recréer les pages qui recevaient ces BL** pour préserver le jus SEO quand Google ré-indexe.

## Plan rebuild

### ✅ Étape 1 — Récup Wayback (FAIT 2026-05-19)
- 97 URLs uniques entre 2015 et 2021 (voir `wayback/norlandascup.fr-wayback-urls.tsv`)
- ~10-12 vraies pages utiles, ~85 lorem ipsum à skipper

### ✅ Étape 2 — Cross-ref Ahrefs Pages (FAIT 2026-05-19)
**La home concentre 99% du jus SEO :**

| URL | RD | DoF | Wayback | Tier |
|---|---|---|---|---|
| https://norlandascup.fr/ | **180** | **94** | ✅ | **TIER 1** |
| http://norlandascup.fr/le-programme-en-cours/ | 1 | 1 | ✅ (2015) | TIER 1 bis |
| http://www.norlandascup.fr/ | 2 | 6 | ✅ | 301 → root |
| http://norlandascup.fr/wp-content/uploads/.../61015716_...jpg | 1 | 1 | ❌ (image) | 301 → home |

### ✅ Étape 1.5 — 9 URLs Google encore indexées (relevées 2026-06-08)

Google retient toujours ces 9 URLs (`site:norlandascup.fr`). À **recréer en priorité Tier 1** pour préserver la continuité de signal au moment de la ré-indexation :

| URL | Type | Section brief |
|---|---|---|
| `/` | home | Section magazine |
| `/format-sportif-2018/` | règlement édition | Section archive |
| `/les-equipages/` | listing équipages | Section archive |
| `/equipage/cane-normandie-developpement/` | fiche équipage | Section archive |
| `/masselin-sogea/` | fiche équipage | Section archive (sans préfixe `/equipage/` à conserver tel quel) |
| `/super-u-2/` | fiche équipage | Section archive |
| `/l2-architectes/` | fiche équipage | Section archive |
| `/interview-economique/` | archive interview | Section archive |
| `/interview-antoine/` | archive interview | Section archive |

→ **Permalink Manager Pro** obligatoire pour respecter ces slugs exacts (notamment l'incohérence `/equipage/{slug}/` vs `/super-u-2/` sans préfixe).

### Étape 2.5 — Prototype design Claude Design (avant impl WP)

⚠️ Décision actée 2026-05-21 : on garde Claude Design comme outil de **prototypage UI** pour TOUS les sites (cohérent brasserieautandem), MAIS l'impl finale = **WP Kadence** (pas Astro).

Workflow norlandascup :
- [x] Créer `claude-design-brief.md` (réécrit 2026-06-08, aligné Angle B + standards skill cam)
- [ ] Itérer le design sur `claude.ai/design` : palette marine profond / crème dunaire / accent rouille balise, typo serif anguleuse de presse (Recoleta, IBM Plex Serif), monospace pour data
- [ ] Export bundle via API Anthropic
- [ ] Theme child Kadence très différencié (anti footprint vs boutique-catea + brasserieautandem) avec CSS du proto en Customizer
- [ ] Recréer pages institutionnelles avec blocs Kadence Elements matchant les composants Claude Design

### Étape 3 — Setup tech — STACK WORDPRESS

⚠️ Décision actée 2026-05-21 : **tous les nouveaux sites en WP** (cf. `feedback_stack_preference_wordpress.md`). Norlandascup = **full WP from start** (vs brasserieautandem en Astro = exception définitive).

État au **2026-06-09** (session reprise après coupure) :
- [x] DNS Cloudflare + NS switch (registrar) — NS `algin.ns.cloudflare.com` + `veronica.ns.cloudflare.com` (paire distincte de boutique-catea/brasserieautandem ✓ anti footprint)
- [x] VPS Contabo `207.180.213.109` (mutualisé) — dir `/var/www/norlandascup/` créé 2026-06-08 21:03
- [x] LEMP : Nginx + MySQL + PHP-FPM (déjà installés, PHP-FPM 8.2)
- [x] **WordPress** installé, DB `norlandascup` user `norlandascup`, fr_FR active, timezone Europe/Paris, permalinks `/%postname%/`, `blog_public=1`, comments closed par défaut, hello-world supprimé, blogdescription set (2026-06-09)
- [x] Theme **Kadence** parent + **`norlandascup-child`** activé
- [x] Plugins actifs : `autoptimize`, `contact-form-7`, `redirection`, `seo-by-rank-math`, `updraftplus`, `wordfence`, `wp-super-cache` (+ `akismet` installé inactif)
- [x] ~~Permalink Manager Pro~~ — **NON installé (décision 2026-06-09)**. Les 9 slugs Google sont alignés via hiérarchie WP standard : page parent `equipage` (#26) → enfant `cane-normandie-developpement` (#27) génère `/equipage/cane-normandie-developpement/` ; les 3 autres équipages (`masselin-sogea`, `super-u-2`, `l2-architectes`) sont des pages racine
- [x] **SSL Cloudflare Origin Certificate** installé 2026-06-09 06:02 UTC — issuer `CloudFlare Origin SSL Certificate Authority`, valide **2026-06-09 → 2041-06-05** (15 ans), SAN `*.norlandascup.fr` + `norlandascup.fr`. Backup self-signed conservé `/etc/ssl/norlandascup/*.selfsigned-20260609-060209.bak`
- [x] Cloudflare SSL/TLS passé en **Full (strict)** (2026-06-09)
- [x] **Cleanup VPS** : `/tmp/new_fullchain.pem` + `/tmp/new_privkey.pem` supprimés (2026-06-09)
- [x] Vhost Nginx `/etc/nginx/sites-enabled/norlandascup` — split apex/www en place
- [x] `nginx -t` validé OK 2026-06-09
- [x] Non-régression : boutique-catea.fr + brasserieautandem.fr renvoient 301 → www (toujours 200 final) après deploy
- [x] 301 rule `wp-content/uploads/.../61015716_*.jpg → /` ✓ testé 2026-06-09
- [x] **Direction 301 = apex → www** (décision finale, cohérent avec brasserieautandem et boutique-catea ; CLAUDE.md disait "www → root" mais c'est l'inverse qui est implémenté)
- [x] Front page statique : page `accueil` (#5) — `show_on_front=page`, `page_on_front=5`
- [x] 23 pages déjà publiées couvrant l'Angle B (portail magazine + section archive) + les 9 URLs Tier 1 toutes en 200 (testé 2026-06-09)
- [x] **6 pages stubs créées 2026-06-09** (suite découverte de liens cassés) : `/equipage/biocombustibles/`, `/equipage/caen-yacht-club/` (refs hardcodées dans page-equipage.php), `/materiel-voile/{voilerie,electronique,securite,vetements-techniques}/` (refs dynamiques dans page-materiel.php). IDs WP 28-33. Toutes en 200.
- [x] **19 articles magazine créés 2026-06-09** (suite découverte cards renvoyant à `/magazine/?rubrique=*` au lieu d'articles uniques) : home lead + 6 cards home + 1 feature magazine + 11 cards magazine. IDs WP 34-52, tous enfants de `magazine` (#6), URLs `/magazine/{slug}/`, template `page-article.php`. Données centralisées dans `wp-theme-child/inc/articles-data.php` (source unique pour cards + page article). `front-page.php` et `page-magazine.php` refactorés pour lire depuis `norlandascup_articles()` et linker vers slugs uniques. Toutes en 200.
- [x] **Images branchées dans le theme child 2026-06-09** : tous les `<div class="ph" data-ph="...">` (placeholders gris) ont reçu `style="background-image:url(NORLANDASCUP_URI/assets/img/...)"`. Total : 8 images home (hero + lead + 6 cards) + 12 images magazine (feature + 11 cards) + 9 images spots + 4 galerie équipage + 3 portraits À propos + 6 archive + 6 matériel + 2 interview. Toutes les 28 images `assets/img/*.webp` du theme child sont désormais utilisées
- [x] **Rank Math configuré 2026-06-09** (le wizard n'avait jamais été finalisé) :
  - `rank_math_is_configured=1`, `rank_math_registration_skip=1`, `rank_math_wizard_completed=1`
  - **Bug rencontré** : option `rank_math_modules` stockée comme **string littérale** (`'a:8:{...}'`) au lieu d'array PHP → tous les modules silencieusement inactifs (Manager::controls ne contenait que les internes). Fix : `wp option update rank_math_modules --format=json '[...]'`
  - Modules actifs : `link-counter, analytics, image-seo, seo-tools, sitemap, breadcrumbs, redirections, role-manager, rich-snippet, robots-txt, instant-indexing`
  - Home page (#5) : `rank_math_title` + `rank_math_description` définies (⚠️ **meta key SANS underscore** — pas `_rank_math_*`)
- [x] **Sitemap Rank Math actif 2026-06-09** : `https://www.norlandascup.fr/sitemap_index.xml` → 200 (1 sous-sitemap `page-sitemap.xml` avec 44 URLs). WP-native `/wp-sitemap.xml` désactivé via `wp_sitemaps_enabled=false` + 301 → `sitemap_index.xml`
- [x] **robots.txt** référence désormais `Sitemap: https://www.norlandascup.fr/sitemap_index.xml`
- [x] **Meta SEO rendues en HTML** : `<title>`, `<meta name="description">`, OG complets (`og:locale/type/title/url/site_name/description`), Twitter Cards, JSON-LD schema (`application/ld+json`)
- [x] **IndexNow opérationnel 2026-06-09** : key Rank Math `818c84f9f2464bc7913b9e1954b62c61` accessible à `/<key>.txt` (200). Ping initial réussi (HTTP 200) pour 15 URLs : 9 Tier 1 + magazine + calendrier + spots + materiel + la-norlandas-cup + contact. Bing/Yandex/Seznam/Naver notifiés. Auto-ping à chaque future publi via module `instant-indexing` actif.
- [ ] **GSC — actions manuelles à faire par l'utilisateur** (pas d'OAuth Rank Math actuellement) :
  - Soumettre sitemap `https://www.norlandascup.fr/sitemap_index.xml` dans property GSC norlandascup.fr
  - URL Inspection + "Demander indexation" sur les 9 URLs Tier 1 (limite 10/jour côté GSC)
  - (Optionnel) Purger `robots.txt` dans CF cache si on ne veut pas attendre 4h
- [ ] **Bing Webmaster Tools — actions manuelles à faire par l'utilisateur** :
  - Ajouter property + import depuis GSC (1 clic)
  - Soumettre `sitemap_index.xml` (Submit sitemap → coller URL)
- [ ] Variables :
  ```
  DOMAIN=norlandascup.fr
  VPS_IP=207.180.213.109
  WP_PATH=/var/www/norlandascup
  WP_DB_NAME=norlandascup
  SSH_KEY=~/.ssh/boutique-catea (clé mutualisée VPS)
  ```

### Étape 4 — Content (cadence Wizards 2 articles/jour via Wisewand)

⚠️ La méthode Wizards officielle dit "remonter vite fait les pages qui faisaient du traf". Pour norlandascup :
- 53 pages skeletons déjà extraites dans `content/` (Wayback fetch fait le 2026-05-20)
- Contenu réel reconstitué dans la session 2026-06-08 (concept Match Race J/80, listing 32 équipages 2016 + 32 équipages 2018, 6 interviews avec contenu intégral). Détails dans le code des templates `wp-theme-child/page-*.php`
- Tier 1 : home (180 RD) — recréer en priorité
- Tier 1 bis : `/le-programme-en-cours/` (1 RD)
- Tier 2-4 : ~50 autres pages (résultats, interviews, équipages — souvent thin Wayback car classements en PNG image)

Pipeline content avec Wisewand :
- Wisewand API utilisée nativement avec WP (webhook Publish to WordPress)
- Brief par tier : résultats vs interviews vs institutionnel vs équipages
- 2 articles/jour cible Wizards
- Volume total : 60 articles/mois
- **Prompt Wisewand renforcé (standards réseau, cf. `feedback_astro_vps_deploy`)** :
  ```
  ZÉRO tiret cadratin "—" ni demi cadratin "–" (signal anti style IA détectable).
  ZÉRO adresse email ni mailto, contact via formulaire uniquement.
  SERP grounded, pas de chiffres inventés (volumétries, dates événements, palmarès).
  Ton humain, anti IA générique, sobre journalistique.
  Articles éditoriaux 900 à 1300 mots avec 4 à 6 <h2> et FAQ.
  ```
- Vérif post génération : `grep -nP '[—–]' content/*.md` doit renvoyer 0 ; `grep -nP 'mailto:' content/*.md` doit renvoyer 0

Niche : voile/régate/sport nautique + tourisme Normandie côtière. Pistes :
- Calendrier régates Normandie/Calvados
- Guide spots de voile en Normandie
- Matériel voile (review équipement)
- Histoire régates locales
- Météo / marées / conditions
- Témoignages skippers
- Pages "événementiel" : recréer la page Norlanda's Cup originale + autres événements régionaux

### Étape 4 — Clients potentiels (vente de liens)
- Voiliers / locations bateaux Normandie
- Écoles de voile
- Équipementiers nautiques (Decathlon, Plastimo, Helly Hansen)
- Comparateurs assurances bateaux
- Tour-opérateurs Normandie
- Hôtels/B&B côte normande
- Offices tourisme régionaux

**ROI estimé** : 10-15 BL/mois × 40-80€ = 400-1200€/mois récurrent.

## Voir aussi
- Process général : `../remontage/CLAUDE.md`
- Stack tech : `../site-template/CLAUDE.md`
- Dashboard analyse : `../domaines/index.html`
- Brief Claude Design : `./claude-design-brief.md` (Angle B portail magazine + 13 pages MVP + standards skill cam)
- Patterns réseau SEO (anti footprint + 0 cadratin + 0 mailto + Bing + GA4) : mémoire `feedback_astro_vps_deploy`
- Décision stack WP : mémoire `feedback_stack_preference_wordpress`
- Zéro référence anciens organisateurs : mémoire `feedback_remontage_zero_reference_anciens_gerants`
