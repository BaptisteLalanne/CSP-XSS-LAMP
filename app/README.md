# SERE : Structure MVC

## Fonctionnement

### Description

Cette architecture MVC est très simpliste, et permet de déployer rapidement un site web avec quelques pages. Une connexion avec une base de données peut être établie.

### Les routes

Pour naviguer d'une page à l'autre, l'application utilise le paramètre GET `route`. Par défaut, s'il n'est pas renseigné, il prend la valeur `home`. Ex : `http://localhost/SERE/app?route=jsonp`

Le fonctionnement des routes est décrit plus en détails dans la suite de ce document.

## Structure

### Racine du projet

`config.php` : contient les informations de connexion à la base de données (variables `$_db_name`, `$_db_host`...)

`routes.php` : contient les routes de notre application. Concrètement, les routes permettent d'appeller une méthode d'un controller pour une URL en particulier. Par exemple, la ligne
```php
$app->route("home", "HomeController", "index");
```
ordonne à l'application d'appeller la méthode `index` du controller `HomeController` lorsque le paramètre GET `route` vaut `home`

`index.php` : pas besoin d'y faire attention, il ne fait qu'inclure le contenu des fichiers `routes.php` et `config.php`

### Dossier model

Dans cette application, un model correspond à une table en base de données. Pour chaque model, une table du même nom (mais tout en minuscule) doit être créée en base de données. La clef primaire de cette table est forcément un entier auto-incrémenté, et doit être nommée `id[nom_table]`.

Soit un model `Commentaire`, possédant 3 attributs : un identifiant, un champ de texte pour le pseudo, un champ de texte pour le contenu du commentaire. En base de données, il est nécessaire d'avoir une table `commentaire`, avec les attributs `idcommentaire`, `pseudo`, `commentaire`. Les deux derniers attributs ont été nommés de manière arbitraire, il n'y a pas de restrictions sur leur nom.

Chaque classe PHP réprésentant un model (comme `Commentaire`) doit étendre la classe `Model`. Une classe PHP représentant un model peut être vide (pas d'attributs, pas de méthodes).

Dans le reste du code de l'application, pour charger des données d'un model (présentes dans la base de données), il suffit d'appeler `NomDuModel::NomDeLaMethode()`. Ex: `Commentaire::all()`

Les méthodes utilisables par tous les models PHP se trouvent dans le fichier `Model.php`. Actuellement, les méthodes disponibles sont :
- `all`: récupère toutes les données de la table,
- `load`: récupère une ligne de la table selon son identifiant (clef primaire),
- `insert` : insère une ligne dans la table,
- `random` : récupère une ligne aléatoire de la table.

### Dossier view

Les vues sont les interfaces de notre application. Ce sont principalement des fragments de pages HTML ou PHP.

### Dossier CSP

Dans ce dossier, nous stockons les entêtes CSP dont nous avons besoin pour l'exploitation de nos failles. Ces entêtes sont codées en PHP.

### Dossier controller

Ici, nous retrouvons nos différents controllers. Chaque controller est une classe PHP qui doit étendre la classe `App.php`. Généralement, une méthode d'un controller récupère des données venant des models ou de la requête (paramères GET, POST, REQUEST, SERVER...), puis renvoie plusieurs fragments de vues à l'aide de la fonction `include_once`.

Pour assurer le bon fonctionnement de chaque page, il est demandé d'inclure la politique de sécurité (CSP) voulue en premier, puis le header (`header.php`). Enfin, le dernier include doit être le footer (`footer.php`). 
