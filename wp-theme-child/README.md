# Norlandascup, theme child Kadence

Port WP du bundle Claude Design `Norlandascup V2-handoff.zip` (home + archive Norlanda's Cup + hub magazine + fiche équipage).

## Installation

1. Avoir Kadence (parent) installé et activé sur le WP cible (`/wp-content/themes/kadence/`).
2. Uploader ce dossier `wp-theme-child/` en `/wp-content/themes/norlandascup-child/`.
3. Apparence, Thèmes, activer **Norlandascup Child**.
4. Régénérer les permaliens : Réglages, Permaliens, Enregistrer (active la réécriture du CPT `equipage`).
5. Plugin **Permalink Manager Pro** obligatoire pour préserver les 9 URLs Google indexées (cf. CLAUDE.md étape 1.5).

## Créer les pages WP et assigner les templates

Pour chaque page ci dessous, dans le panneau Page, choisir le template dans la sidebar.

| Slug URL              | Titre                                          | Template à choisir                  |
|-----------------------|------------------------------------------------|-------------------------------------|
| `/` (front-page)      | Norlanda's Cup, magazine de voile              | (automatique via `front-page.php`)  |
| `/magazine/`          | Le magazine de la voile en Normandie côtière   | **Hub Magazine**                    |
| `/la-norlandas-cup/`  | Norlanda's Cup, la régate de la presqu'île     | **Archive Norlanda's Cup**          |
| `/equipage/cane-normandie-developpement/` | Cane Normandie Développement   | **Fiche équipage (archive)**        |
| `/masselin-sogea/`    | Masselin Sogea                                 | **Fiche équipage (archive)** + Permalink Manager pour forcer slug racine |
| `/super-u-2/`         | Super U                                        | **Fiche équipage (archive)** + Permalink Manager |
| `/l2-architectes/`    | L2 Architectes                                 | **Fiche équipage (archive)** + Permalink Manager |
| `/les-equipages/`     | Les équipages 2010 à 2018                      | (à coder ensuite, hub liste équipages) |
| `/format-sportif-2018/` | Format sportif 2018                          | (à coder ensuite, archive règlement) |
| `/interview-economique/`, `/interview-antoine/` | Interviews historiques        | (à coder ensuite, template interview) |
| `/calendrier-regates-normandie/` | Calendrier des régates                | (à coder ensuite, table calendrier) |
| `/spots-de-voile-normandie/` | Spots                                     | (à coder ensuite, carte + cards spots) |
| `/materiel-voile/`    | Matériel voile                                 | (à coder ensuite, hub rubriques) |
| `/a-propos/`          | À propos de la rédaction                       | (page standard Kadence) |
| `/contact/`           | Nous contacter                                 | (page standard Kadence + formulaire CF7 ou WPForms) |
| `/mentions-legales/`, `/politique-de-confidentialite/` | Légales                | (page standard Kadence) |

## Standards appliqués (anti footprint réseau, cf. mémoire feedback_astro_vps_deploy)

- ⛔ Zéro tiret cadratin `—` ou demi cadratin `–` (signal anti style IA)
- ⛔ Zéro `mailto:` ni adresse email visible. Tout contact via formulaire `/contact/`
- ⛔ Zéro adresse postale fictive, zéro numéro de téléphone
- Theme child visuellement très différent de boutique-catea et brasserieautandem (palette marine + serif anguleuse IBM Plex Serif)
- Compte Cloudflare distinct à créer pour ce site (paire NS différente)

## Architecture

```
wp-theme-child/
├── style.css                  # Frontmatter WP (Template: kadence)
├── functions.php              # Enqueue + theme supports + CPT equipage
├── header.php                 # Top bar + header sticky + drawer mobile
├── footer.php                 # Footer 4 colonnes + botbar
├── front-page.php             # Home (hero + cond + magazine grid + archive banner + newsletter)
├── page-la-norlandas-cup.php  # Template archive principale
├── page-magazine.php          # Template hub magazine (filtre rubriques + grille)
├── page-equipage.php          # Template fiche équipage (exemple Cane Normandie 2016)
├── inc/
│   └── helpers.php            # Composants partagés (brand block, archive banner, breadcrumb, cond tile)
├── assets/
│   ├── css/theme.css          # CSS unifié 1500 lignes (consolidé depuis les 4 HTML proto)
│   └── js/theme.js            # JS unifié (drawer + fade-in + chip filter + mag-grid filter)
└── README.md                  # Ce fichier
```

## Variables design system

Palette dans `:root` (`assets/css/theme.css` lignes 19-39) :

| Token            | Valeur     | Usage                                  |
|------------------|------------|----------------------------------------|
| `--marine`       | `#0F2A44`  | Couleur principale, fonds sombres, H1  |
| `--marine-deep`  | `#0A1E33`  | Top bar, footer, hero veil             |
| `--creme`        | `#F2EBDC`  | Fond body, contrastes sombres          |
| `--creme-pure`   | `#F7F2E8`  | Variante crème lumineuse, inputs       |
| `--rouille`      | `#B85C38`  | Accent rouille balise, CTAs primaires  |
| `--sable`        | `#C9B999`  | Texte secondaire sur fond sombre       |
| `--glacier`      | `#7FA5C7`  | Bleu glacier, labels dans data         |
| `--encre`        | `#1A1A1A`  | Corps de texte                         |

Typo :
- `--serif` : `IBM Plex Serif` (titres anguleuse de presse maritime)
- `--sans`  : `IBM Plex Sans` (corps)
- `--mono`  : `IBM Plex Mono` (data, kickers, métas)

## TODO post installation

- [ ] Setup VPS Contabo `/var/www/norlandascup/` + WP + Kadence
- [ ] Permalink Manager Pro pour les slugs Google indexés
- [ ] Cloudflare Origin Cert + Full strict
- [ ] CF7 ou WPForms pour `/contact/` (formulaire DMCA + autres)
- [ ] Schema.org : `Event eventStatus EventCancelled` sur `/la-norlandas-cup/`, `Organization` home, `NewsArticle` magazine
- [ ] GSC + Bing Webmaster (sitemap soumis aux deux)
- [ ] GA4 + tracking conversion
- [ ] Wisewand API webhook pour cadence 2 articles par jour (cf. CLAUDE.md étape 4)
- [ ] Coder les templates manquants : `page-les-equipages.php`, `page-format-sportif-2018.php`, `template-interview.php`, `page-calendrier.php`, `page-spots.php`, `page-materiel.php`
