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

### Étape 2.5 — Prototype design Claude Design (avant impl WP)

⚠️ Décision actée 2026-05-21 : on garde Claude Design comme outil de **prototypage UI** pour TOUS les sites (cohérent brasserieautandem), MAIS l'impl finale = **WP Kadence** (pas Astro).

Workflow norlandascup :
- [ ] Créer `claude-design-brief.md` adapté niche sport régates Normandie (référence template `brasserieautandem/claude-design-brief.md`)
- [ ] Itérer le design sur `claude.ai/design` (couleurs Norvégie/marine, typo)
- [ ] Export bundle via API Anthropic
- [ ] Extraire CSS du proto → coller dans Customizer Kadence WP
- [ ] Recréer pages institutionnelles avec HTML matchant les composants Claude Design

### Étape 3 — Setup tech — STACK WORDPRESS

⚠️ Décision actée 2026-05-21 : **tous les nouveaux sites en WP** (cf. `feedback_stack_preference_wordpress.md`). Norlandascup = **full WP from start** (vs brasserieautandem en Astro = exception définitive).

Setup à reproduire (calqué sur boutique-catea) :
- [ ] DNS Cloudflare + NS switch (registrar)
- [ ] VPS Contabo `207.180.213.109` (mutualisé) — dir `/var/www/norlandascup/`
- [ ] LEMP : Nginx + MySQL + PHP-FPM (déjà installés)
- [ ] **WordPress** latest
- [ ] Theme **Kadence 1.4.5** (cohérent boutique-catea)
- [ ] Plugins : Rank Math SEO, WP Super Cache, Wordfence, UpdraftPlus, Redirection
- [ ] **Permalink Manager Pro** pour préserver le slug racine `/` et les URLs Wayback à trafic
- [ ] SSL Cloudflare Origin Certificate (15 ans) + Full (strict)
- [ ] Vhost Nginx split apex/www + 301 server-side (idem brasserieautandem cf. `feedback_astro_vps_deploy`)
- [ ] 301 rules: `www.* → root` + `wp-content/uploads/.../61015716_*.jpg → /`
- [ ] Variables :
  ```
  DOMAIN=norlandascup.fr
  VPS_IP=207.180.213.109
  WP_PATH=/var/www/norlandascup
  WP_DB_NAME=norlandascup
  ```

### Étape 4 — Content (cadence Wizards 2 articles/jour via Wisewand)

⚠️ La méthode Wizards officielle dit "remonter vite fait les pages qui faisaient du traf". Pour norlandascup :
- 53 pages skeletons déjà extraites dans `content/` (Wayback fetch fait le 2026-05-20)
- Tier 1 : home (180 RD) — recréer en priorité
- Tier 1 bis : `/le-programme-en-cours/` (1 RD)
- Tier 2-4 : ~50 autres pages (résultats, interviews, équipages — souvent thin Wayback car classements en PNG image)

Pipeline content avec Wisewand :
- Wisewand API utilisée nativement avec WP (webhook Publish to WordPress)
- Brief par tier : résultats vs interviews vs institutionnel vs équipages
- 2 articles/jour cible Wizards
- Volume total : 60 articles/mois

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
