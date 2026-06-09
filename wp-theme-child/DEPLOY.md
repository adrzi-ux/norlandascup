# Déploiement norlandascup, étape par étape

VPS Contabo `207.180.213.109` (mutualisé avec boutique-catea + brasserieautandem).

## 0, Pré-requis

- Accès SSH au VPS avec ta clé `~/.ssh/boutique-catea` (ou la clé qui ouvre `root@207.180.213.109`)
- Compte Cloudflare distinct de boutique-catea (pour avoir une **paire NS différente**, anti footprint, cf. mémoire `feedback_astro_vps_deploy` patterns réseau SEO)
- Accès registrar du domaine `norlandascup.fr` pour le NS switch
- Plugin **Permalink Manager Pro** acheté (49 EUR one shot, mutualisé) pour préserver les 9 slugs Google indexés

## 1, DNS Cloudflare (compte distinct)

Sur le **nouveau** compte Cloudflare distinct :

```
cloudflare_add_zone(name=norlandascup.fr, account=<NOUVEAU>)
cloudflare_add_dns_record(zone_name=norlandascup.fr, type=A, name=@,   content=207.180.213.109, proxied=false)
cloudflare_add_dns_record(zone_name=norlandascup.fr, type=A, name=www, content=207.180.213.109, proxied=false)
```

Pose les NS Cloudflare chez le registrar. **Grey cloud (proxied=false) pour l'instant** (Let's Encrypt n'est pas utilisé, mais on aura besoin de la résolution origine pour l'install).

Attendre la propagation (`nslookup norlandascup.fr 1.1.1.1` doit renvoyer 207.180.213.109).

## 2, Setup serveur, docroot et base

SSH au VPS et créer la structure :

```bash
ssh -i ~/.ssh/boutique-catea root@207.180.213.109

# Docroot
mkdir -p /var/www/norlandascup
chown -R www-data:www-data /var/www/norlandascup

# Base MySQL
mysql -uroot -p <<EOF
CREATE DATABASE norlandascup CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'norlandascup'@'localhost' IDENTIFIED BY 'GENERER_UN_MDP_FORT';
GRANT ALL PRIVILEGES ON norlandascup.* TO 'norlandascup'@'localhost';
FLUSH PRIVILEGES;
EOF
```

Anti clobber : si le docroot ou la base existent déjà, **arrêter** et vérifier. Ne pas écraser.

## 3, Install WordPress core via wp-cli

```bash
cd /var/www/norlandascup

# Download WP (utiliser wp-cli déjà installé sur le VPS)
sudo -u www-data wp core download --locale=fr_FR

# Config
sudo -u www-data wp config create \
    --dbname=norlandascup \
    --dbuser=norlandascup \
    --dbpass='LE_MDP_GENERE' \
    --dbhost=localhost \
    --dbcharset=utf8mb4 \
    --extra-php <<EOF
define('WP_DEBUG', false);
define('DISABLE_WP_CRON', true);
define('WP_POST_REVISIONS', 5);
define('AUTOMATIC_UPDATER_DISABLED', true);
EOF

# Install
sudo -u www-data wp core install \
    --url=https://www.norlandascup.fr \
    --title="Norlanda's Cup, magazine de voile en Normandie côtière" \
    --admin_user=adrien \
    --admin_password='MDP_ADMIN_FORT' \
    --admin_email=raynard.adrien@gmail.com \
    --skip-email
```

## 4, Theme parent Kadence + theme child

```bash
# Kadence parent (gratuit, depuis wordpress.org)
sudo -u www-data wp theme install kadence

# Upload du theme child depuis local (Windows)
# Sur ta machine Windows :
scp -i ~/.ssh/boutique-catea -r C:/Users/araynard/Desktop/claude/norlandascup/wp-theme-child \
    root@207.180.213.109:/var/www/norlandascup/wp-content/themes/norlandascup-child

# Activation
ssh -i ~/.ssh/boutique-catea root@207.180.213.109 \
    "cd /var/www/norlandascup && sudo -u www-data wp theme activate norlandascup-child && \
     chown -R www-data:www-data wp-content/themes/norlandascup-child"
```

## 5, Plugins essentiels

```bash
cd /var/www/norlandascup

# Gratuits depuis wordpress.org
sudo -u www-data wp plugin install rank-math-seo wp-super-cache wordfence updraftplus redirection wp-mail-smtp --activate

# Permalink Manager Pro (à uploader manuellement, c'est un plugin payant)
# scp depuis local :
#   scp permalink-manager-pro.zip root@207.180.213.109:/tmp/
# puis sur le VPS :
#   sudo -u www-data wp plugin install /tmp/permalink-manager-pro.zip --activate

# Formulaire : Contact Form 7 ou WPForms (au choix)
sudo -u www-data wp plugin install contact-form-7 --activate
```

## 6, Création des 18 pages WP + assignation templates

Tout en une commande via le script bundle :

```bash
cd /var/www/norlandascup
sudo -u www-data bash wp-content/themes/norlandascup-child/install-pages.sh
```

Ce script crée :
- Accueil (front page)
- 4 pages magazine vivante : /magazine/, /calendrier-regates-normandie/, /spots-de-voile-normandie/, /materiel-voile/
- 3 pages archive : /la-norlandas-cup/, /les-equipages/, /format-sportif-2018/
- 2 interviews : /interview-economique/, /interview-antoine/
- 4 fiches équipage : /equipage/cane-normandie-developpement/, /masselin-sogea/, /super-u-2/, /l2-architectes/
- 4 institutionnelles : /a-propos/, /contact/, /mentions-legales/, /politique-de-confidentialite/

Soit 18 pages au total, dont **9 URLs Google indexées préservées**.

## 7, Permalink Manager Pro pour les 3 slugs racines

3 fiches équipages ont des slugs **à la racine** (pas en sous-page) car ainsi indexées par Google :
- /masselin-sogea/
- /super-u-2/
- /l2-architectes/

WordPress va vouloir les mettre en sous-page parent (par exemple /equipage/masselin-sogea/). Permalink Manager Pro permet de forcer le slug exact :

1. Plugins, Permalink Manager Pro, paramètres
2. Pour chaque page concernée, mettre le custom slug à la racine
3. Tester avec `curl -sI https://www.norlandascup.fr/masselin-sogea/` (attendu 200)

## 8, Nginx vhost

Calqué sur brasserieautandem (cf. mémoire `feedback_astro_vps_deploy`). Créer `/etc/nginx/sites-available/norlandascup` :

```nginx
# Apex vers www, 301 server side
server {
    listen 80;
    listen 443 ssl http2;
    server_name norlandascup.fr;
    ssl_certificate /etc/ssl/norlandascup/fullchain.pem;
    ssl_certificate_key /etc/ssl/norlandascup/privkey.pem;
    return 301 https://www.norlandascup.fr$request_uri;
}

# www, canonique
server {
    listen 80;
    listen 443 ssl http2;
    server_name www.norlandascup.fr;

    ssl_certificate /etc/ssl/norlandascup/fullchain.pem;
    ssl_certificate_key /etc/ssl/norlandascup/privkey.pem;

    root /var/www/norlandascup;
    index index.php index.html;

    # Image cassée Wayback à rediriger vers home
    location ~ ^/wp-content/uploads/.*/61015716_.*\.jpg$ {
        return 301 https://www.norlandascup.fr/;
    }

    # WordPress
    location / {
        try_files $uri $uri/ /index.php?$args;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    # Cache statique
    location ~* \.(css|js|jpg|jpeg|png|webp|svg|woff2?|ttf|ico)$ {
        expires 30d;
        add_header Cache-Control "public, no-transform";
        access_log off;
    }

    # Security headers
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    add_header Referrer-Policy "strict-origin-when-cross-origin";

    gzip on; gzip_vary on; gzip_min_length 256;
    gzip_types text/plain text/css application/json application/javascript text/xml application/xml text/javascript image/svg+xml;
}
```

Activer + tester + reload :
```bash
ln -s /etc/nginx/sites-available/norlandascup /etc/nginx/sites-enabled/
nginx -t && systemctl reload nginx
```

**Garde fou** : `nginx -t` doit passer avant le reload. Si KO, restaurer le vhost précédent (`.bak`) et ne pas reload.

## 9, SSL Cloudflare Origin Certificate

1. Cloudflare, SSL/TLS, Origin Server, Create Certificate (RSA 2048, 15 ans, SAN `*.norlandascup.fr, norlandascup.fr`)
2. Copier `fullchain.pem` et `privkey.pem` dans `/etc/ssl/norlandascup/` (chmod 644 / 600)
3. Vérifier la correspondance :
   ```bash
   openssl x509 -noout -modulus -in /etc/ssl/norlandascup/fullchain.pem | openssl md5
   openssl rsa  -noout -modulus -in /etc/ssl/norlandascup/privkey.pem  | openssl md5
   ```
   Les deux doivent matcher.
4. Cloudflare, SSL/TLS, mode **Full (strict)**
5. Always Use HTTPS, ON
6. Proxied, **orange cloud** activé

## 10, Validation end-to-end

Depuis ta machine locale :
```bash
DOMAIN=www.norlandascup.fr bash wp-content/themes/norlandascup-child/validate-norlandascup.sh
```

Ou via SSH sur le VPS :
```bash
ssh -i ~/.ssh/boutique-catea root@207.180.213.109 \
    "bash /var/www/norlandascup/wp-content/themes/norlandascup-child/validate-norlandascup.sh"
```

Le script vérifie :
1. Routes 200 sur les 18 URLs (dont les 9 Google indexées)
2. Sitemap et robots.txt
3. Canonical absolu et og:url
4. 0 cadratin, 0 mailto sur 4 pages échantillon
5. JSON-LD présent
6. Non-régression : boutique-catea.fr et brasserieautandem.fr toujours 200
7. Apex vers www, 301
8. Verdict global, exit 0 ou 1

## 11, Go live SEO

- TXT GSC apex via Cloudflare DNS
- Vérifier dans Google Search Console, propriété domain
- Soumettre `/sitemap_index.xml` à **GSC ET Bing Webmaster** (skill cam dit : Bing source les LLM, ne pas sous-estimer)
- Poser GA4 ou Plausible
- Vérifier un event tracking de bout en bout

## 12, Checklist post déploiement

- [ ] Theme child activé, validation skill ok
- [ ] 18 pages créées, 9 URLs Google indexées 200
- [ ] Permalink Manager Pro configuré pour les 3 slugs racines
- [ ] SSL Cloudflare Origin 15 ans posé, Full strict actif
- [ ] Nginx 301 apex vers www, server side
- [ ] Image cassée `/wp-content/uploads/.../61015716_*.jpg` redirigée vers /
- [ ] Sitemap soumis à GSC ET Bing
- [ ] GA4 posé et event prouvé
- [ ] Theme child très différencié de boutique-catea Kadence (palette marine, IBM Plex Serif)
- [ ] Compte Cloudflare distinct (paire NS différente, anti footprint)
- [ ] Email contact, formulaire CF7 ou WPForms posé, 0 mailto visible
- [ ] Brasserieautandem et boutique-catea, non régression vérifiée

## 13, Quoi en cas de problème

Voir mémoire `feedback_astro_vps_deploy` section "Pièges identifiés" pour les erreurs communes :
- Cloudflare en Full SSL nécessite que Nginx écoute en 443 (pas 80), sinon fallback default vhost
- Typo Name dans Cloudflare DNS, utiliser `@` pas le domaine en clair
- `curl -H Host:` ne fonctionne pas pour HTTPS, utiliser `--resolve`
- Cache navigateur, Ctrl+F5 après deploy
