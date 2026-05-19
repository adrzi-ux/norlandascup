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

## Plan rebuild (à compléter)

### Étape 1 — Récup Wayback
- [ ] Lister tous les snapshots Wayback disponibles
- [ ] Récupérer la dernière version complète (2018 probable)
- [ ] Identifier les URLs qui recevaient les BL (cross-ref avec Ahrefs Backlinks → Pages)

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
