# Prompts Claude Design, norlandascup.fr

Prêts à copier coller dans `claude.ai/design`. Un prompt par bloc.
Référence complète et workflow : `./claude-design-brief.md`.

---

## 1, PROMPT PRINCIPAL (commencer ici)

```
Je veux designer un site nommé "Norlanda's Cup", un magazine éditorial dédié à la voile, aux régates et au tourisme nautique en Normandie côtière (Calvados, Côte de Nacre, presqu'île du Cotentin), porté par la mémoire d'une régate du même nom qui s'est tenue dans la presqu'île normande entre 2010 et 2018. La compétition n'a pas été reconduite, mais ses archives vivent sur le site : équipages, interviews d'époque, format sportif, palmarès. Tout autour, une vraie rédaction couvre les régates actives du littoral, les spots, le matériel, la météo, les portraits de skippers. Ce n'est pas un site de club, ni un Tripadvisor de la voile : c'est un magazine indépendant.

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

## 2, FOLLOW-UPS (un par page, après la home)

### 2.1 Page archive Norlanda's Cup

```
Designe /la-norlandas-cup/. Page archive principale de l'événement historique (2010 à 2018). Layout : breadcrumb + H1 "Norlanda's Cup, la régate de la presqu'île" + ArchiveBanner en tête ("Page d'archive, édition non reconduite depuis 2018") + section histoire (3 paragraphes éditoriaux, pas de noms d'organisateurs ni d'adresse) + section format sportif (résumé règlement) + section palmarès (liste 2010 à 2018 avec vainqueurs) + section partenaires institutionnels (logos sobres : Calvados, Côte de Nacre tourisme, sans email ni mention agence) + lien vers /les-equipages/ + lien vers /format-sportif-2018/. Zéro tiret cadratin, zéro email.
```

### 2.2 Page listing équipages

```
Designe /les-equipages/. Layout : breadcrumb + H1 + intro éditoriale (2 paragraphes) + filtres par édition (2010 à 2018) + grille 3 colonnes de EquipageCard (12 à 16 équipages historiques, exemples : Cane Normandie Développement, Masselin Sogea, L2 Architectes, Super U, Axians, Biocombustibles, CR de Normandie). Chaque card cliquable, lien vers la fiche équipage.
```

### 2.3 Fiche équipage type

```
Designe /equipage/{slug}/, template pour les 12 à 16 fiches équipages. Layout : breadcrumb + hero (logo sponsor en cartouche + nom du bateau + édition année) + 2 colonnes : Identité (skipper, équipiers, sponsor, port d'attache, bateau série longueur) | Palmarès (classements par édition) + section "Galerie" (3 à 4 photos) + bloc "Autres équipages de cette édition" (3 cards) + lien retour /les-equipages/.
```

### 2.4 Archive règlement édition 2018

```
Designe /format-sportif-2018/. Layout : breadcrumb + H1 + ArchiveBanner + intro éditoriale (présentation du règlement édition 2018) + sommaire latéral sticky + corps règlement (sections : parcours, classes de bateaux, départ, points de passage, classement, sanctions, sécurité) + bloc "Autres archives" (lien /la-norlandas-cup/ et /les-equipages/).
```

### 2.5 Article interview archive

```
Designe le template /interview-{slug}/ avec les 2 archives historiques /interview-economique/ et /interview-antoine/. Layout : breadcrumb + ArchiveBanner + hero (photo interviewé en situation portuaire + H1 + chapô + métas tag "Archive édition 2018") + corps interview en 1 colonne lecture confortable, format question réponse avec questions en serif gras + bloc "À lire aussi dans les archives" (2 ou 3 cards).
```

### 2.6 Hub magazine

```
Designe /magazine/. Hub éditorial principal. Layout : breadcrumb + H1 "Le magazine" + filtre par rubrique (Régates, Spots, Matériel, Météo, Portraits) + grille 3 colonnes de ArticleCard (12 articles récents) + pagination + CTABanner "Recevoir notre newsletter" en bas.
```

### 2.7 Article éditorial type

```
Designe un article éditorial type pour le magazine. Layout : breadcrumb + hero photo plein cadre + métas (rubrique, date, temps de lecture) + H1 serif large + chapô + sticky table of contents à gauche desktop + corps article 1 colonne lecture confortable + citations en exergue + galerie photos inline + bloc "À lire aussi" en bas (3 ArticleCard) + Schema.org Article JSON LD à prévoir côté code. Zéro tiret cadratin.
```

### 2.8 Calendrier régates Normandie

```
Designe /calendrier-regates-normandie/. Layout : breadcrumb + H1 + intro éditoriale + filtres (mois, lieu, niveau, type) + CalendarTable responsive (date, nom de la régate, lieu, organisateur, niveau, lien détail). Sur mobile, transformer la table en liste de cards empilées. Ajouter NewsletterBox en bas "Recevoir le calendrier mensuel".
```

### 2.9 Guide spots de voile

```
Designe /spots-de-voile-normandie/. Layout : breadcrumb + H1 + intro éditoriale géographique (Côte de Nacre, presqu'île du Cotentin, baie de Seine) + carte interactive de la côte normande avec markers + grille 3 colonnes de SpotCard (8 à 12 spots : Deauville, Trouville, Cabourg, Ouistreham, Port en Bessin, Granville, Cherbourg, Saint Vaast la Hougue, Honfleur). Filtres par niveau et par spécialité (régate, croisière, école).
```

### 2.10 Hub matériel voile

```
Designe /materiel-voile/. Layout : breadcrumb + H1 + intro + grille 4 cards rubriques (Voilerie, Électronique, Sécurité, Vêtements techniques). Chaque card cliquable vers /materiel-voile/voilerie/ etc. Section "Derniers tests matériel" en grille de 6 ArticleCard.
```

### 2.11 À propos rédaction

```
Designe /a-propos/. Layout : hero éditorial simple (photo grand large vue port + H1) + 2 paragraphes ligne éditoriale (sobre, factuelle, indépendance) + section "La rédaction" avec 3 ou 4 cards portraits (nom, rôle, courte bio). Pas de fondateurs, juste l'équipe rédactionnelle actuelle + section indépendance éditoriale + CTA vers /contact/.
```

### 2.12 Contact

```
Designe /contact/. Layout : 1 colonne centrée. H1 "Nous contacter" + paragraphe intro "Le magazine Norlanda's Cup répond uniquement via le formulaire ci dessous" + ContactForm (nom, email visiteur, sujet en select avec options Question, Suggestion d'article, DMCA, Partenariat, Autre, message, checkbox RGPD) + bouton "Envoyer". Aucune adresse email visible, aucun numéro de téléphone, aucune adresse postale. Juste le formulaire.
```

---

## Workflow

1. Coller le PROMPT PRINCIPAL (section 1) dans `claude.ai/design`
2. Itérer la home jusqu'à validation
3. Enchaîner les 12 follow ups (sections 2.1 à 2.12), une page par message
4. Exporter screenshots vers `norlandascup/design/[page].png` (et tar.gz API Anthropic si disponible)
5. Revenir avec les exports pour transposition theme child Kadence
