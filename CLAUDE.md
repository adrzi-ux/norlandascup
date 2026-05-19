# CLAUDE.md — norlandascup.fr

## Statut
✓ **ACHETÉ le 2026-05-19** — premier achat du projet remontage expired.

## Contexte
- **Activité originale** : "Norlanda's Cup — Régates de la presqu'île" (organisation/festival de régates)
- **Dernière activité Wayback** : 2018
- **Niche cible rebuild** : Sport / Régates / Tourisme Normandie

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

### Étape 3 — Setup tech (à venir)
- [ ] DNS + VPS + LEMP + WP
- [ ] **Permalink Manager** pour slug racine `/` exact
- [ ] Variables :
  ```
  DOMAIN=norlandascup.fr
  VPS_IP=
  WP_PATH=/var/www/norlandascup
  ```
- [ ] 301 rules: `www.* → root` + `wp-content/uploads/.../61015716_*.jpg → /`

### Étape 2 — Setup tech
- [ ] VPS + DNS + LEMP + WP (suivre `site-template/`)
- [ ] SSL Let's Encrypt
- [ ] Variables à définir :
  ```
  DOMAIN=norlandascup.fr
  VPS_IP=
  WP_PATH=/var/www/norlandascup
  ```

### Étape 3 — Content (15-25 articles)
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
