# Brief Claude Design — norlandascup.fr

**Outil cible :** `claude.ai/design` (prototypage UI Anthropic)
**Sortie attendue :** maquettes UI + design system exploitables → moi je code l'implémentation **WP Kadence** ensuite (CSS du proto collé dans Customizer + composants HTML en blocks Gutenberg)
**Référence template** : voir `brasserieautandem/claude-design-brief.md` pour le format

---

## 0 — Comment utiliser ce brief

1. Va sur **`claude.ai/design`**
2. Nouveau projet → colle le **PROMPT PRINCIPAL** ci-dessous (section 1)
3. Itère via les **FOLLOW-UP PROMPTS** (section 2) pour affiner page par page
4. Exporte les maquettes validées (screenshots + idéalement export tar.gz API)
5. Reviens me partager les exports → je code l'implémentation WP Kadence

---

## 1 — PROMPT PRINCIPAL (copy-paste tel quel)

```
Je veux designer un site nommé "Norlanda's Cup" — un magazine éditorial dédié à la voile et aux régates en Normandie, et particulièrement à l'événement éponyme "Norlanda's Cup" qui se déroule chaque été depuis 2010 dans la baie de Caen (Calvados). Le site n'est pas la vitrine de l'événement : c'est un magazine indépendant qui couvre :

- L'événement Norlanda's Cup chaque été (et ses archives sur 15+ éditions)
- Les régates régionales en Normandie (Calvados, La Manche, Côtes de la Manche)
- Les spots de voile, marées, conditions
- Portraits skippers et équipages locaux
- Calendrier régional et résultats détaillés

🎯 Objectif design : un site qui inspire confiance et passion maritime, ancré Normandie (gris-bleu mer du Nord, brumes atlantiques, lumière froide et belle), avec un design sportif et factuel sans être agressif. Référence : style "Voiles et Voiliers" / "Sail Magazine" / "The Outpost Magazine" mais avec ancrage local Normandie (un peu plus rugueux, terre-à-terre, pas glamour Côte d'Azur).

🎨 Identité visuelle :
- Palette principale : bleu marine #1B3A4F, bleu acier #4A6B82, blanc coquille #F4F1EB, rouge signal #C44536 (accent rare, pour CTAs/classements vainqueur), gris ardoise #6B7280
- Typographie : titres en display moderne robuste (Recoleta, Söhne Headline, ou Inter Display), corps de texte en sans-serif technique (Inter ou Söhne), monospace pour les chiffres/data/classements (JetBrains Mono)
- Layout : grilles modulaires, aéré, beaucoup de chiffres et data tabulés (classements, temps, écarts), photos panoramiques bateaux/mer
- Imagerie : voiliers en action vue 3/4 ou aérienne, mer agitée de Normandie, ports (Caen, Ouistreham, Honfleur), portraits skippers (mains gantées, visages tannés), lumière atlantique
- Iconographie : lignes fines minimalistes (ancre, voile, vague, drapeau de course, compas, bouée)
- Tone of voice : journalistique sportif, factuel, respectueux des chiffres et classements. Pas de superlatifs marketing. Adresse à la 3e personne pour les articles, "vous" pour les CTAs.

📐 Pages à designer (10 pages MVP) :
1. Home — Hero photo régate en action + numéro édition courante + 3 CTA (Classement live / Calendrier / Norlanda's Cup) + dernières actus + carnet de bord récent + classement abrégé en cours
2. /norlandas-cup/ — Présentation de l'événement principal (histoire 15+ éditions, parcours, archives par année)
3. /classements/ — Hub des classements (édition en cours en haut, historique 15 ans en archive)
4. /equipages/ — Annuaire équipages (style portraits avec capitaine + bateau + classements historiques)
5. /spots/ — Guide des spots de voile Normandie (Calvados + Manche) avec carte
6. /calendrier/ — Calendrier annuel régates régionales (vue année + détail par mois)
7. /actualites/ — Blog/news (carnet de bord du magazine)
8. /partenaires/ — Sponsors historiques + partenaires institutionnels (Calvados, Caen, etc.)
9. /a-propos/ — Histoire du magazine + équipe rédaction
10. /contact/ — Form + adresse rédaction (fictive, dans Calvados)

🧱 Composants réutilisables à designer :
- Header avec brand "Norlanda's Cup" (logo : voile stylisée minimaliste + wordmark) + nav principale + CTA "Édition en cours"
- Footer 4 colonnes (rubriques + partenaires + réseaux + crédits)
- Hero variants : Home (large image action plein-écran + overlay) / Page (image + breadcrumb + intro)
- ResultCard : numéro édition + année + vainqueur + 3 stats clés (temps total, écart, équipages)
- EquipageCard : nom équipage + capitaine + bateau + village d'attache + classement actuel
- SpotCard : nom port/spot + carte mini + conditions typiques (vent, marées, niveau)
- ClassementTable : tableau classement type sport (rang, équipage, temps, écart, points)
- CalendarRow : ligne événement (date, lieu, type de course, lien)
- DataStrip : ruban statistiques (N° édition courante, X équipages, Y dates, Z années)
- NewsletterForm
- CTABanner : section pleine largeur fond bleu marine + texte + bouton "Suivre la prochaine édition"

📱 Responsive : mobile-first. Tableaux classements scrollables horizontalement sur mobile. Photos hero adaptatives.

✨ Touches UX : transitions douces, hover subtle, parallax léger sur photos paysages, classements avec hover row → highlight. Quand on est sur la page "classement édition courante", indication subtile "MIS À JOUR il y a X minutes".

Commence par me proposer le design de la HOME avec tous les composants utilisés, puis on itérera page par page.
```

---

## 2 — FOLLOW-UP PROMPTS (à utiliser après la home)

Une fois la home validée, utilise ces prompts pour itérer page par page :

### Norlanda's Cup (présentation événement)
```
Designe /norlandas-cup/. Layout : full-bleed hero (photo départ régate, drapeau) + intro éditoriale historique (3 paragraphes, "depuis 2010") + timeline interactive des 15+ éditions avec image + vainqueur + nb d'équipages par édition + section "Le parcours" (carte stylisée baie de Caen avec waypoints) + section "Records & faits marquants" (data tabulée).
```

### Classements
```
Designe /classements/. Layout : hero compact "Édition 2026 en cours" + sticky bar avec stats (nombre équipages, étapes finies, durée totale) + ClassementTable full (rang/équipage/capitaine/bateau/temps/écart/points avec icon de tendance) + section "Archives" (cards par année des 15 éditions précédentes avec vainqueur) + filtres (édition, catégorie).
```

### Équipages
```
Designe /equipages/. Layout : breadcrumb + H1 + intro 2 lignes + filtres (catégorie, ancienneté) + grille de EquipageCard (4 colonnes desktop, portrait capitaine + bateau + village + meilleur classement) + footer page "Voir tous les équipages historiques".
```

### Spots de voile
```
Designe /spots/. Layout : hero avec carte interactive de la Normandie côtière + grille de SpotCard (port, type d'eau, niveau requis, conditions typiques de vent) + section "Conseils de saison" (mois par mois, recommandations).
```

### Calendrier
```
Designe /calendrier/. Layout : vue calendaire annuelle (12 mois sur 3 lignes, événements visibles dans chaque mois) + détail par mois en dessous (CalendarRow avec date / nom événement / lieu / niveau / link) + filtres par type de course.
```

### Page édition individuelle (template résultat d'une année)
```
Designe /editions/2025/ comme template d'archive. Layout : hero photo + titre "Norlanda's Cup 2025" + DataStrip stats (vainqueur, X équipages, Y étapes, Z écart final) + ClassementTable finale + section "Faits marquants" (3-4 cards) + galerie photos (4-6) + lien vers Norlanda's Cup historique.
```

---

## 3 — Exports souhaités

- **Screenshots PNG** de chaque page validée → `norlandascup/design/[page].png`
- **Code HTML/CSS** si Claude Design le propose → `norlandascup/design/code-exports/`
- **Design tokens** (couleurs, typographies, spacings) → `norlandascup/design/tokens.md`
- **Bundle tar.gz** via API Anthropic (si disponible)

---

## 4 — Ce qu'on fera ensuite (moi, après tes exports)

⚠️ Stack cible : **WP Kadence** (pas Astro). Workflow d'impl :

1. **Setup tech WP** (cf. `boutique-catea` comme référence) :
   - VPS Contabo `/var/www/norlandascup/` + WP latest + MySQL
   - Theme Kadence 1.4.5
   - Plugins essentiels : Rank Math, WP Super Cache, Wordfence, UpdraftPlus, Redirection
   - **Permalink Manager Pro** pour préserver les slugs Wayback à trafic
2. **Port du design Claude Design → Kadence** :
   - CSS du proto → Customizer Kadence (Custom CSS)
   - Composants HTML/blocks → pages WP via `wp_insert_post()` avec content matching les classes CSS du proto
   - mu-plugins si features custom (style boutique-catea)
3. **Contenu via Wisewand API** :
   - Brief par tier : résultats / interviews / équipages / institutionnel
   - Cadence 2 articles/jour (Wizards)
   - Webhook Wisewand → WP direct
4. **JSON-LD** : Schema.org SportsEvent (Norlanda's Cup), Article (actus), Person (skippers/équipages)
5. **Pages depuis Wayback** : 53 skeletons déjà extraits dans `content/` (slugs préservés via Permalink Manager)
6. **Déploiement** :
   - DNS Cloudflare (NS switch chez internet.bs)
   - SSL Cloudflare Origin Certificate + Full (strict)
   - Vhost Nginx split apex/www + 301 server-side (cf. `feedback_astro_vps_deploy.md`)
   - Sitemap + robots.txt + GSC submit

---

## Liens utiles

- Référence design d'inspiration (brasserieautandem) : `../brasserieautandem/claude-design-brief.md`
- Contexte projet : `./CLAUDE.md`
- Process général remontage : `../remontage/CLAUDE.md`
- Décision stack WP : `~/.claude/.../memory/feedback_stack_preference_wordpress.md`
- 53 pages Wayback skeletons : `./content/`

## Différences vs brasserieautandem

| Aspect | brasserieautandem | norlandascup |
|---|---|---|
| Stack impl | Astro statique (exception) | **WP Kadence** |
| Niche | Gastronomie / recettes | Voile / régates / Normandie |
| Palette | Chaud (terracotta + olive + lavande) | **Froid (bleu marine + ardoise + rouge accent rare)** |
| Typo | Cormorant Garamond (chaleureuse) | **Recoleta / Söhne Headline (technique)** |
| Tone | Éditorial gourmand chaleureux | **Journalistique sportif factuel** |
| Imagerie | Plats provençaux, terrasse, producteurs | **Voiliers, mer agitée, ports normands, skippers** |
| Composants spécifiques | RecipeCard, ProducerCard, WineMatchTable | **ResultCard, EquipageCard, ClassementTable, CalendarRow** |
