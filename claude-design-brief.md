# Brief Claude Design, norlandascup.fr

**Outil cible :** `claude.ai/design` (prototypage UI Anthropic)
**Sortie attendue :** maquettes UI + design system exploitables. Je code l'implémentation en theme child WordPress Kadence (pas Astro, voir mémoire `feedback_stack_preference_wordpress`)
**Référence template** : voir `brasserieautandem/claude-design-brief.md` pour le format
**Version :** réécrit le 2026-06-08 pour alignement Angle B (portail magazine) + standards réseau SEO (anti footprint, 0 cadratin, 0 mailto) issus du skill `cam-site-builder-wa`. Voir mémoire `feedback_astro_vps_deploy` section "Patterns réseau SEO"

---

## 0, Comment utiliser ce brief

1. Aller sur `claude.ai/design`
2. Nouveau projet, coller le PROMPT PRINCIPAL ci dessous (section 1)
3. Itérer via les FOLLOW UP PROMPTS (section 2), une page par message
4. Exporter les maquettes validées (screenshots PNG, code HTML/CSS si disponible, bundle tar.gz via API Anthropic si disponible)
5. Revenir avec les exports. Je code le theme child Kadence ensuite

---

## 1, PROMPT PRINCIPAL (copy paste tel quel)

```
Je veux designer un site nommé "Norlanda's Cup", un magazine éditorial dédié à la voile, aux régates et au tourisme nautique en Normandie côtière (Calvados, Côte de Nacre, presqu'île du Cotentin), porté par la mémoire d'une régate inter-entreprises qui s'est tenue en J/80 monotype format Match Race à Caen, dans la baie de Seine, entre 2010 et 2018. La compétition n'a pas été reconduite, mais ses archives vivent sur le site : équipages des 9 éditions, interviews d'époque, format sportif, partenaires institutionnels. Tout autour, une vraie rédaction couvre les régates actives du littoral, les spots, le matériel, la météo, les portraits de skippers. Ce n'est pas un site de club, ni un Tripadvisor de la voile : c'est un magazine indépendant.

🎯 Objectif design : un site qui respire la mer du Nord, la rigueur du monde de la voile, la lumière froide et belle de l'Atlantique nord, avec une exécution moderne, sobre, magazine. Il doit ressembler à Tip and Shaft, Voiles et Voiliers, Yachting Monthly, Sail World, ou The Outpost Magazine, mais avec ancrage Normandie (plus rugueux, terre à terre, pas glamour Côte d'Azur), pas à Marmiton, Decathlon ou TripAdvisor.

🎨 Identité visuelle :
- Palette principale : marine profond #0F2A44, crème dunaire #F2EBDC, rouille balise #B85C38 (accent rare, CTAs et hover), sable mouillé #C9B999, bleu glacier #7FA5C7, noir d'encre #1A1A1A
- Typographie : titres en serif anguleuse de presse maritime (Recoleta, IBM Plex Serif ou Roboto Slab), corps en sans serif neutre lisible (Inter, IBM Plex Sans, Söhne), monospace pour les data tabulées (IBM Plex Mono ou JetBrains Mono)
- Layout : aéré, grilles éditoriales modulaires, beaucoup de blanc, ratios photo 4:5 ou 3:2 ambiance magazine papier, pas de carrousels
- Imagerie : voiliers en course gros temps, ports normands (Deauville, Honfleur, Cherbourg, Port en Bessin), portraits skippers à bord (mains gantées, visages tannés), falaises Étretat, plans d'eau Côte de Nacre, équipements voile cordage cabestan winch
- Iconographie : minimaliste, signaux nautiques (drapeaux Alpha Bravo Charlie), lignes fines bleues, pas d'illustration cartoon
- Tone of voice : technique mais accessible, sobre, factuel, journalistique. Pas de superlatifs marketing. 3e personne pour les articles éditoriaux, "vous" pour les CTAs

📐 Pages à designer (13 pages MVP) :
1. Home, portail magazine, hero photo régate + double CTA (Magazine, Calendrier) + grille 6 articles récents + bloc archive Norlanda's Cup en pied
2. /magazine/, hub éditorial principal, filtre rubriques (Régates, Spots, Matériel, Météo, Portraits) + grille 12 articles + pagination
3. /calendrier-regates-normandie/, calendrier annuel des régates régionales, tableau filtrable par mois et par lieu
4. /spots-de-voile-normandie/, guide des spots avec carte interactive (Deauville, Cherbourg, Honfleur, Port en Bessin, Granville, Saint Vaast, Trouville, Cabourg)
5. /materiel-voile/, hub guides matériel (Voilerie, Électronique, Sécurité, Vêtements techniques)
6. /la-norlandas-cup/, page archive principale de la régate historique, statut neutre "édition non reconduite depuis 2018, archives consultables", histoire, format sportif, palmarès 2010 à 2018, partenaires institutionnels historiques (logos sobres uniquement)
7. /les-equipages/, listing historique des équipages 2010 à 2018, grille avec filtre par édition
8. /equipage/{slug}/, fiche équipage template, 4 fiches prioritaires (slugs déjà indexés Google à préserver) : Cane Normandie Développement, Masselin Sogea, L2 Architectes, Super U
9. /format-sportif-2018/, archive règlement édition 2018, sommaire latéral sticky
10. /interview-{slug}/, template archive interview, 2 archives à préserver (interview-economique, interview-antoine)
11. /a-propos/, présentation de la rédaction (équipe éditoriale actuelle, ligne éditoriale, indépendance). Pas de fondateurs, juste la rédaction d'aujourd'hui
12. /contact/, formulaire uniquement, aucune adresse email ou postale ou téléphone visible
13. /mentions-legales/ et /politique-de-confidentialite/, légales standard

🧱 Composants réutilisables à designer :
- Header magazine avec nav principale (logo Norlanda's Cup + Magazine / Calendrier / Spots / Matériel / Archive / Contact)
- Footer 4 colonnes (sitemap éditorial + newsletter régates + crédits + liens légaux)
- Hero variants : Home (large photo + double CTA) / Catégorie (photo + breadcrumb + intro éditoriale) / Article (photo plein cadre + métas)
- ArticleCard : photo 4:5 + tag rubrique + titre serif + date + extrait 2 lignes
- EquipageCard : logo sponsor en cartouche + nom bateau + skipper + édition année + lien fiche
- SpotCard : photo port + nom + ville + tags (niveau, spécialité)
- CalendarTable : ligne par régate (date, nom, lieu, organisateur, niveau, lien), responsive en cards empilées mobile
- ArchiveBanner : encart spécifique pages historiques, fond marine, texte crème "Page d'archive, Norlanda's Cup éditions 2010 à 2018"
- CTABanner : section pleine largeur fond marine ou rouille, texte crème
- NewsletterBox : champ email + bouton "Recevoir le calendrier des régates"
- ContactForm : nom, email visiteur, sujet en select (Question, Suggestion d'article, DMCA, Partenariat, Autre), message, RGPD

📱 Responsive : mobile first. Nav burger sur mobile, grilles 1 col mobile, 2 cols tablet, 3 ou 4 cols desktop. Tableaux scrollables ou en cards empilées sur mobile.

✨ Touches UX : fade in scroll doux, hover subtle sur cards (élévation légère + ombre marine), pas de carrousels (anti pattern UX), sticky table of contents sur les longs articles éditoriaux.

📝 Trois exigences techniques de rédaction (le site sera ensuite peuplé par un pipeline IA, autant les poser dès le design) :
- Aucun tiret cadratin "—" ni demi cadratin "–" nulle part (titres, corps, captions, alt), utiliser virgule, point, deux points, parenthèses. C'est un signal anti style IA que Google détecte
- Aucune adresse email visible, aucun numéro de téléphone, aucune adresse postale fictive. Tout contact passe par le formulaire
- Le site partage le VPS avec "Brasserie Au Tandem" (palette terracotta Provence, serif chaleureuse Cormorant) et "Catea" (éducation féline). Le design doit être visuellement très différent des deux, surtout PAS la même Playfair ou Cormorant ronde qu'un site cuisine. Préférer la serif anguleuse de presse

Commence par me proposer le design de la HOME avec tous les composants utilisés (Header, Hero, grille articles, ArchiveBanner, CTABanner, Footer), puis on itérera page par page.
```

---

## 2, FOLLOW UP PROMPTS (à utiliser après la home)

Une fois la home validée, itérer page par page (un prompt par message Claude Design).

### Page archive événement Norlanda's Cup
```
Maintenant designe la page /la-norlandas-cup/. C'est la page archive principale de l'événement historique (2010 à 2018). Régate inter-entreprises en J/80 monotype, format Match Race, à Caen, baie de Seine. 32 équipages au pic en 2018, répartis en 4 groupes de 8 (A, B, C, D), phases puis finales sur 5 à 7 jours fin mai. Layout : breadcrumb + H1 "Norlanda's Cup, la régate inter-entreprises de Caen" + ArchiveBanner en tête ("Page d'archive, édition non reconduite depuis 2018") + section histoire (3 paragraphes éditoriaux, pas de noms d'organisateurs ni d'adresse) + section format sportif (Match Race J/80, 4 groupes, déroulé semaine) + section éditions (table évolution 2010 à 2018, équipages au départ par année, sans vainqueurs scratch qui ne sont pas disponibles en archive Wayback) + section partenaires institutionnels (logos sobres : Conseil départemental du Calvados, Région Normandie, Ville de Caen, Caen la Mer, Ligue de voile de Normandie, CCI Port Caen Ouistreham) + lien vers /les-equipages/ + lien vers /format-sportif-2018/. ZÉRO cadratin, ZÉRO email.
```

### Page listing équipages
```
Designe /les-equipages/. Layout : breadcrumb + H1 + intro éditoriale (2 paragraphes) + filtres par édition (2010 à 2018) + grille 3 colonnes de EquipageCard (12 à 16 équipages historiques, exemples : Cane Normandie Développement, Masselin Sogea, L2 Architectes, Super U, Axians, Biocombustibles, CR de Normandie). Chaque card cliquable, lien vers la fiche équipage.
```

### Fiche équipage type
```
Designe /equipage/{slug}/, template pour les 12 à 16 fiches équipages. Layout : breadcrumb + hero (logo sponsor en cartouche + nom du bateau + édition année) + 2 colonnes : Identité (skipper, équipiers, sponsor, port d'attache, bateau série longueur) | Palmarès (classements par édition) + section "Galerie" (3 à 4 photos) + bloc "Autres équipages de cette édition" (3 cards) + lien retour /les-equipages/.
```

### Page archive règlement
```
Designe /format-sportif-2018/. Layout : breadcrumb + H1 + ArchiveBanner + intro éditoriale (présentation du règlement édition 2018) + sommaire latéral sticky + corps règlement (sections : parcours, classes de bateaux, départ, points de passage, classement, sanctions, sécurité) + bloc "Autres archives" (lien /la-norlandas-cup/ et /les-equipages/).
```

### Article interview archive
```
Designe le template /interview-{slug}/ avec les 2 archives historiques /interview-economique/ et /interview-antoine/. Layout : breadcrumb + ArchiveBanner + hero (photo interviewé en situation portuaire + H1 + chapô + métas tag "Archive édition 2018") + corps interview en 2 colonnes max, format question réponse avec questions en serif gras + bloc "À lire aussi dans les archives" (2 ou 3 cards).
```

### Hub magazine
```
Designe /magazine/. C'est le hub éditorial principal. Layout : breadcrumb + H1 "Le magazine" + filtre par rubrique (Régates, Spots, Matériel, Météo, Portraits) + grille 3 colonnes de ArticleCard (12 articles récents) + pagination + CTABanner "Recevoir notre newsletter" en bas.
```

### Article éditorial type
```
Designe un article éditorial type pour le magazine. Layout : breadcrumb + hero photo plein cadre + métas (rubrique, date, temps de lecture) + H1 serif large + chapô + sticky table of contents à gauche desktop + corps article 1 colonne lecture confortable + citations en exergue + galerie photos inline + bloc "À lire aussi" en bas (3 ArticleCard) + Schema.org Article JSON LD à prévoir côté code. ZÉRO cadratin.
```

### Calendrier régates Normandie
```
Designe /calendrier-regates-normandie/. Layout : breadcrumb + H1 + intro éditoriale + filtres (mois, lieu, niveau, type) + CalendarTable responsive (date, nom de la régate, lieu, organisateur, niveau, lien détail). Sur mobile, transformer la table en liste de cards empilées. Ajouter NewsletterBox en bas "Recevoir le calendrier mensuel".
```

### Guide spots de voile
```
Designe /spots-de-voile-normandie/. Layout : breadcrumb + H1 + intro éditoriale géographique (Côte de Nacre, presqu'île du Cotentin, baie de Seine) + carte interactive de la côte normande avec markers + grille 3 colonnes de SpotCard (8 à 12 spots : Deauville, Trouville, Cabourg, Ouistreham, Port en Bessin, Granville, Cherbourg, Saint Vaast la Hougue, Honfleur). Filtres par niveau et par spécialité (régate, croisière, école).
```

### Hub matériel voile
```
Designe /materiel-voile/. Layout : breadcrumb + H1 + intro + grille 4 cards rubriques (Voilerie, Électronique, Sécurité, Vêtements techniques). Chaque card cliquable vers /materiel-voile/voilerie/ etc. Section "Derniers tests matériel" en grille de 6 ArticleCard.
```

### À propos rédaction
```
Designe /a-propos/. Layout : hero éditorial simple (photo grand large vue port + H1) + 2 paragraphes ligne éditoriale (sobre, factuelle, indépendance) + section "La rédaction" avec 3 ou 4 cards portraits (nom, rôle, courte bio). PAS DE FONDATEURS, juste l'équipe rédactionnelle actuelle + section indépendance éditoriale + CTA vers /contact/.
```

### Contact
```
Designe /contact/. Layout : 1 colonne centrée. H1 "Nous contacter" + paragraphe intro "Le magazine Norlanda's Cup répond uniquement via le formulaire ci dessous" + ContactForm (nom, email visiteur, sujet en select avec options Question, Suggestion d'article, DMCA, Partenariat, Autre, message, checkbox RGPD) + bouton "Envoyer". AUCUNE adresse email visible, AUCUN numéro de téléphone, AUCUNE adresse postale. Juste le formulaire.
```

---

## 3, Exports souhaités

Idéalement, après itérations, exporter :
- **Screenshots PNG** de chaque page validée vers `norlandascup/design/[page].png`
- **Code HTML/CSS** si Claude Design le propose vers `norlandascup/design/code-exports/`
- **Design tokens** (couleurs, typos, spacings) vers `norlandascup/design/tokens.md`
- **Bundle tar.gz** via API Anthropic si disponible (cf. process `reference_claude_design`)

À défaut, juste les screenshots me suffisent. Je transpose en theme child Kadence à partir du visuel.

---

## 4, Ce qu'on fera ensuite (moi, après tes exports)

⚠️ Stack cible : **WP Kadence + theme child très différencié** (anti footprint). Pas Astro.

1. **Setup tech WP** (cf. boutique-catea comme référence) :
   - VPS Contabo 207.180.213.109, dir `/var/www/norlandascup/` + WP latest + MySQL + nginx + PHP FPM 8.x
   - Theme Kadence 1.4.5 + **theme child très différencié** (typo/palette/composants distincts de boutique-catea Kadence)
   - Plugins essentiels : Rank Math SEO, WP Super Cache, Wordfence, UpdraftPlus, Redirection
   - **Permalink Manager Pro** pour préserver les slugs des 9 URLs Google encore indexées
2. **Port du design Claude Design vers Kadence** :
   - CSS du proto vers Customizer Kadence (Custom CSS)
   - Composants HTML/blocks vers pages WP via blocs Kadence Elements + custom CSS
   - mu plugins si features custom (style boutique-catea)
3. **Contenu via Wisewand API** :
   - Brief par tier : archive (équipages, interviews, format sportif), magazine vivante (régates, spots, matériel)
   - Cadence 2 articles par jour (méthode Wizards)
   - Webhook Wisewand vers WP direct
   - ⚠️ Prompt Wisewand renforcé : "ZÉRO tiret cadratin, ZÉRO mailto, SERP grounded, ton humain anti IA, pas de chiffres inventés"
4. **JSON-LD** :
   - `Organization` sur home (publisher éditorial, sans email ni téléphone)
   - `Event` schema avec `eventStatus: EventCancelled` ou `EventPostponed` sur `/la-norlandas-cup/` et fiches éditions archive
   - `NewsArticle` sur articles éditoriaux magazine
   - `Person` sur fiches équipage (skippers historiques)
   - Canonical absolu et og:url absolu dès le départ (leçon brasserieautandem fix 2026-06-07)
5. **Pages depuis Wayback** : 53 skeletons déjà extraits dans `content/`, slugs préservés via Permalink Manager
6. **Anti footprint réseau** :
   - Compte Cloudflare distinct de boutique-catea + brasserieautandem, paire NS différente
   - Theme child Kadence visuellement très différent
   - Bloc SEO footer rédigé spécifiquement (jamais le même texte qu'un autre site)
7. **Déploiement** :
   - DNS Cloudflare (NS switch chez registrar)
   - SSL Cloudflare Origin Certificate 15 ans + Full (strict)
   - Vhost Nginx split apex et www + 301 server side (cf. mémoire `feedback_astro_vps_deploy`)
   - Anti clobber : refuser le deploy si `/var/www/norlandascup/` existe déjà
   - `nginx -t` validé avant chaque reload, backup et rollback si KO
8. **Validation pré go live** : script `validate-norlandascup.sh` (routes 200 sur 13 pages + 9 URLs Google indexées + sitemap + canonical + JSON-LD + robots + non régression brasserieautandem.fr et boutique-catea.fr toujours 200)
9. **Go live SEO élargi** :
   - TXT GSC apex via Cloudflare
   - Sitemap soumis à GSC ET Bing Webmaster (Bing source les LLM/GPT)
   - GA4 posé + preuve event tracking en bout de chaîne
   - 301 server side : `wp-content/uploads/.../61015716_*.jpg` vers `/`, `www.*` vers root

---

## Liens utiles

- Contexte projet : `./CLAUDE.md`
- Process général remontage : `../remontage/CLAUDE.md`
- Référence de format brief : `../brasserieautandem/claude-design-brief.md`
- 53 pages Wayback skeletons : `./content/`
- Patterns réseau SEO et standards : mémoire `feedback_astro_vps_deploy`
- Décision stack WP : mémoire `feedback_stack_preference_wordpress`
- Pas de noms des anciens gérants : mémoire `feedback_remontage_zero_reference_anciens_gerants`

## Différences vs brasserieautandem

| Aspect | brasserieautandem | norlandascup |
|---|---|---|
| Stack impl | Astro statique (exception définitive du réseau) | **WP Kadence + theme child très différencié** |
| Niche | Gastronomie, recettes Provence | Voile, régates, tourisme Normandie côtière |
| Palette | Chaud (terracotta + olive + lavande) | **Froid (marine profond + crème dunaire + accent rouille balise)** |
| Typo | Cormorant Garamond (chaleureuse arrondie) | **Recoleta / IBM Plex Serif (anguleuse de presse), monospace pour data** |
| Tone | Éditorial gourmand chaleureux | **Journalistique sportif sobre factuel** |
| Imagerie | Plats provençaux, terrasse, producteurs | **Voiliers gros temps, ports normands, skippers, falaises Étretat** |
| Composants spécifiques | RecipeCard, ProducerCard, WineMatchTable | **ArticleCard, EquipageCard, SpotCard, CalendarTable, ArchiveBanner** |
| Angle narratif | Brasserie active + magazine recettes | **Archive événement (non reconduit 2018) + magazine vivant régates** |
| Contact | contact@brasserieautandem.fr visible (à reconsidérer rétro actif) | **Formulaire uniquement, ZÉRO email visible** |
| Standards typo | Cadratins présents (pré standard) | **ZÉRO cadratin (standard skill cam appliqué)** |
