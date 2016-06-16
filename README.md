# SerialWatcher

## Documenation

Vous trouverez la documentation à la racine du projet sous le nom de **SerialWatcher.pdf**

## Prérequis

-	PHP : v7.0.6
-	Composer : Permet de gérer toutes les dépendances php.
-	Une base de données mysql pour utiliser le projet. Exemple « serialwatcher ».

## Installation

1. Cloner le projet.
2. Déplacer-vous à la racine du projet
```sh
# Cela vas installer toutes les dépendances
composer install
```
3. Copier le fichier **.env.example** et nommer le **.env**
4. Générer la clef api Laravel
```sh
php artisan key:generate
```
5. Ensuite éditer le fichier **.env** afin que les données 
   de connexion à la base de donnée correspondre à votre configuration.
```
   DB_HOST : nom du host (localhost)
   DB_DATABASE : nom de la base de données (serialwatcher)
   DB_USERNAME : Nom d’utilisateur de la base de données.
   DB_PASSWORD : Mot de passe de la base de données. (laisser vide si pas de mot de passe).
```
6. Importer la base de données
```sh
php artisan migrate
```
7. Importer les données de tests
```sh
php artisan db:seed 
```

## Exécuter le projet

Maintenant que vous avez télécharger toutes les dépendances, créer la base de 
données et configurer la web application vous pouvez maintenant lancer le serveurs.

```sh
php artisan serve –port 8082
```
Vous pouvez accéder à l’application via l’url : http://localhost:8082/

Pour accéder à l’api : http://localhost:8082/api/

## Routes

| Method | URI                          | Description                                                                                              | Attributes                                    | Returned value             | Middleware |
|--------|------------------------------|----------------------------------------------------------------------------------------------------------|-----------------------------------------------|----------------------------|------------|
| POST   | api/authenticate             | Get the Token of the current user                                                                        | {user} : with pseudo and,password             | {String} : JSON Web,Tokens | -          |
| GET    | api/authenticate/user        | Get the user object without password {user}                                                              | -                                             | {User}                     | -          |
| GET    | api/calendar                 | Get an array of episodes unreleased yet from the series that the current user follows.                   | -                                             | Array of Episodes          | jwt.auth   |
| POST   | api/episode/seen/{id}/{seen} | Update database if the current user has seen the given episode.                                          | {id} : database   episode ID {seen} : boolean | -                          | jwt.auth   |
| GET    | api/episode/{id}             | Get full data of an episode.                                                                             | {id} : database episode ID                    | Episode                    | -          |
| GET    | api/episodes/seen/{idseason} | Get the episodes seen by the current user in the given season.                                           | {idseason} : database season ID               | Array of Episodes          | jwt.auth   |
| GET    | api/favourites               | Get the 10 favourites series of the current user                                                         | -                                             | Array of Series            | jwt.auth   |
| GET    | api/featured                 | Get the 10 featured series of the database                                                               | -                                             | Array of Series            | -          |
| GET    | api/profile/personal         | Get personal data of the current user.                                                                   | -                                             | User                       | jwt.auth   |
| POST   | api/profile/personal         | Update personal data of the current user by the form informations.                                       | -                                             | -                          | jwt.auth   |
| GET    | api/profile/subscriptions    | Get all series followed by the current user.                                                             | -                                             | Array of Series            | jwt.auth   |
| GET    | api/search/{string}          | Get a list of series from the external api matching the given string                                     | {string} :   string to match titles           | Array of Series            | -          |
| GET    | api/serie/filled/{id}        | Get a serie from its database ID and fill database with its full information                             | {id} : database serie ID                      | Series                     | -          |
| GET    | api/serie/{id}               | Get a serie from its database ID                                                                         | {id} : database serie ID                      | Series                     | -          |
| POST   | api/signup                   | Create a new user                                                                                        | -                                             | -                          | -          |
| POST   | api/serie/subscribe/{id}     | Add the given serie to the current user subscriptions                                                    | {id} : database serie ID                      | -                          | jwt.auth   |
| GET    | api/serie/subscribed/{id}    | Check if the current user follows the given serie                                                        | {id} : database serie ID                      | Boolean                    | jwt.auth   |
| GET    | api/towatch                  | Return all episodes that the current user hasn't seen and that belongs to the series followed by him     | -                                             | Array of Series            | jwt.auth   |
| POST   | api/serie/unsubscribe/{id}   | Remove the given serie to the current user subscriptions                                                 | {id} : database serie ID                      | -                          | jwt.auth   |


