# Content extracted from Wayback Machine

**Extraction date :** 2026-05-20
**Script :** `../../remontage/fetch_wayback_content.js`

## Stats

- **53 pages** extraites au total (sur 97 URLs Wayback, 15 skippées : lorem ipsum + utilitaires WP)
- **3 fiches équipage** samples (axians, biocombustibles, c-r-de-normandie-2) — les 30 autres équipages restent à générer programmatiquement
- **Contenu textuel limité** : le site original était très visuel (classements en PNG, photos). Seulement 4 pages contiennent du texte exploitable.

## Tier breakdown

| Tier | Pages | État |
|---|---|---|
| `home` | 1 | titre seul (snapshot 2015 minimal) |
| `institutionnel` | 12 | titres + 1 page riche (la-norlandas-cup-revient) |
| `resultats` | 17 | titres seuls (classements en image PNG sur le site original) |
| `interview` | 7 | titres seuls (contenu image probable) |
| `equipage` | 3 samples / 33 total | titres seuls (template répété) |
| `category` | 4 | listes posts (peu utile pour content) |
| `autre` | 9 | divers |

## Pourquoi peu de texte ?

Le HTML 2015-2018 utilisait `<div class="article-content">` avec uniquement des `<img>` pointant vers PDF/PNG. Les classements (`/classement-*`) et résultats (`/resultats-*`) étaient publiés en image, pas en HTML structuré.

→ Pour le rebuild, on **génère** le contenu texte avec IA (Wisewand/Otomatic) à partir du **slug + titre + tier + thématique**. C'est la méthode Wizards "remonter vite fait les pages qui faisaient du traf" avec template unique.

## Format des fichiers

Front-matter YAML :
```
source_url: URL originale norlandascup.fr
wayback_snapshot: date du snapshot
wayback_url: URL Wayback (avec /id_/ pour HTML brut)
domain: norlandascup.fr
tier: home/institutionnel/resultats/interview/equipage/category
original_title: titre HTML original
original_h1: H1 si capturé
original_description: meta description si capturée
```

Puis le contenu (H1, paragraphes) tel qu'extrait du Wayback.

## Étapes suivantes

1. **Génération IA** : briefer Wisewand/Otomatic avec slug + titre + tier + thématique (sport/régates Normandie) pour chaque page
2. **Template équipages** : générer programmatiquement les 33 fiches à partir des 3 samples + liste équipages
3. **Setup WP + Permalink Manager** : déployer avec les slugs originaux préservés
