# Mettre en place un espace membre : Inscription

Gérer des utilisateurs est aujourd’hui un besoin récurrent et essentiel sur de nombreux sites web. Concrètement un espace membre est constitué, au minimum, des fonctionnalités suivantes :
- **Inscription**
- **Connexion** / **déconnexion**

Découvrons comment implémenter proprement cette mécanique au sein de notre micro framework PHP.

## Une BDD pour nos utilisateurs

Mettre en place un espace membre nécessite avant tout **une table dédiée à l'enregistrement de nos utilisateurs**.

<!--::alert{type="build"}-->
Créer une table `user` contenant les colonnes suivantes :
- `id` *(int)* - clé primaire
- `email` *(varchar)*
- `password` *(varchar)*
- `created_at` *(datetime)*
- `updated_at` *(datetime)* - `null` par défaut
<!--::-->

## Création des fichiers élémentaires

Un espace membre, c'est avant tout un CRUD, basé sur des utilisateurs. Nous allons donc commencer par créer **contrôleur**, **entité** et **gestionnaire** associé.

### Un contrôleur

<!--::alert{type="build"}-->
Créer un contrôleur nommé `📄 UserController.php`.
<!--::-->

```php [UserController.php]
<?php
namespace App\Controller;
 
use Plugo\Controller\AbstractController;
 
class UserController extends AbstractController {
 
}
```

<!--::alert-->
Vous compléterez ce contrôleur par la suite.
<!--::-->

### Une entité

Créons un modèle type d'utilisateur, mappant via ses attributs, les colonnes de notre table `user`.

<!--::alert{type="build"}-->
Créer une entité nommée `📄 User.php`.
<!--::-->

```php [User.php]
<?php
namespace App\Entity;
 
class User {
  // A compléter...
}
```

### Un gestionnaire d'entité (manager)

Qu'il s'agisse, **d'inscription**, **d'édition**, **de suppression** ou encore **de récupération** d'un utilisateur en base de données, nous avons besoin d'un gestionnaire d'entité afin d'effectuer les opérations élémentaires du CRUD sur notre entité `User`.

<!--::alert{type="build"}-->
Créer un gestionnaire d'entité nommé `📄 UserManager.php`.
<!--::-->

```php [User.php]
<?php
namespace App\Manager;
 
use Plugo\Manager\AbstractManager;
use App\Entity\User;
 
class UserManager extends AbstractManager {
 
}
```

<!--::alert-->
Vous compléterez ce gestionnaire par la suite.
<!--::-->


## Inscription

### 1. Route : user_register

Commençons par ajouter une nouvelle route nommée `user_register` dans notre fichier `📄 routes.php`. 

```php [routes.php]
'user_register' => [
  // A compléter
],
```

Cette route appellera la méthode `register()` présente dans le contrôleur `UserController`.


### 2. Méthode de manager : add()

Commençons par y implémenter la méthode `add()`, effectuant via notre `AbstractManager`, l'enregistrement d'un utilisateur en BD.

```php [UserManager.php]
<?php
namespace App\Manager;
 
use Plugo\Manager\AbstractManager;
use App\Entity\User;
 
class UserManager extends AbstractManager {

  public function add(User $user) {
    // A compléter...
  }
 
}
```


### 3. Template du formulaire : register.php

Pour s'inscrire, un utilisateur devra renseigner via un formulaire les champs suivants :
- Adresse email
- Mot de passe
- Confirmation de mot de passe

<!--::alert{type="build"}-->
Créer une page `📄 user/register.php`.
<!--::-->

Le formulaire d'inscription enverra les données sur **la même page**, via la méthode HTTP `POST`.

```html [register.php]
<!-- A Compléter -->
```


### 4. Méthode de contrôleur : register()

Dans le fichier `📄 UserController.php`, il est désormais temps de créer la méthode de contrôleur `register()` dédiée à l'enregistrement d'un utilisateur.

L'objectif de cette méthode est double, en fonction la méthode HTTP de la requête :
- `GET` : **Afficher le formulaire** d'inscription
- `POST` : **Enregistrer un utilisateur** en base de données

<!--::alert{type="build"}-->
Créer une méthode de contrôleur nommée `register()`.
<!--::-->

```php [UserController.php]
<?php
namespace App\Controller;
 
use Plugo\Controller\AbstractController;
 
class UserController extends AbstractController {

  public function register() {
    // A compléter...
  }
 
}
```


### 5. Un lien dans le menu

Vous pouvez ajouter un lien vers le formulaire ainsi créé, dans votre menu.

```html
<a href="?page=user_register">Inscription</a>
```