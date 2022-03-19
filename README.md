# SERE

Attaques XSS avec contournement de CSP (CSP bypass).

Méthodes utilisées :
- JSONP
- injection de script par image,
- dangling markup.

L'application web se trouve dans le dossier `www`


# Install 
*Before starting the installation, check if the environment variables (port used, versions) are suitable for you in `.env`*


```bash
docker-compose up -d
```

The install is composed of:
- PHPMyAdmin
- PHP
- MySQL server
- Apache 2