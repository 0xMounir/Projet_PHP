# Projet en PHP

Ce projet consiste à la création d'un site web permettant à des utilisateurs de créer leur compte et de publier des annonces immobilières pour des logements ou bien tout simplement réserver.

## 💡 Fonctionnalités

Les fonctionnalités principales de ce projet sont les suivantes:

`Création d'un compte utilisateur.`  
`Connexion à un compte utilisateur.`  
`Modification du profil de l'utilisateur.`  
`Affichage des annonces immobilières.`

`------------------------------------------------`

`Organiser son projet et découper ses fichiers.`  
`Manipuler les variables superglobales ($_GET, $_POST, $_SESSION...).`  
`Formater et indenter correctement son code.`  
`Réaliser des classes et/ou des fonctions.`  
`Externaliser correctement la configuration, connexion.`  
`Utiliser des requêtes préparées / non préparées.`  
`Utiliser les fonctions et la POO (refactorisation).`

## 🛠️ Technologies utilisées

Ce projet a été créé en utilisant les langages suivants:

```
HTML / CSS / JavaScript / PHP / MySQL
```

## 📚 Dictionnaire de données

### Table utilisateurs

| Nom           | Type de donnée | Description                                             |
| ------------- | -------------- | ------------------------------------------------------- |
| id            | int            | clé primaire et unique                                  |
| firstname     | varchar(255)   | prénom de l'utilisateur                                 |
| lastname      | varchar(255)   | nom de l'utilisateur                                    |
| email         | varchar(255)   | adresse e-mail de l'utilisateur                         |
| password      | varchar(255)   | mot de passe de l'utilisateur                           |
| birthdate     | date           | date de naissance de l'utilisateur                      |
| phone         | varchar(15)    | téléphone de l'utilisateur                              |
| country       | varchar(100)   | pays de l'utilisateur                                   |
| profile_image | varchar(255)   | photo de profil de l'utilisateur                        |
| created_at    | date           | date de création de compte de l'utilisateur             |
| is_certified  | tinyint(1)     | si l'utilisateur est certifié ou pas                    |
| role          | varchar(100)   | le rôle de l'utilisateur (utilisateur / administrateur) |

### Table propriétés

| Nom             | Type de donnée | Description                                |
| --------------- | -------------- | ------------------------------------------ |
| id              | int            | clé primaire et unique                     |
| name            | varchar(100)   | nom de la propriété                        |
| description     | varchar(255)   | description de la propriété                |
| owner_id        | int            | propriétaire de la propriété               |
| type            | varchar(100)   | type de la propriété                       |
| total_occupancy | int            | total d'occupants dans la propriété        |
| bedrooms_count  | int            | total de chambres dans la propriété        |
| bathrooms_count | int            | total de salles de bains dans la propriété |
| has_kitchen     | tinyint(1)     | si la propriété a une cuisine ou pas       |
| has_internet    | tinyint(1)     | si la propriété a le wifi ou pas           |
| adress          | varchar(255)   | l'adresse de la propriété                  |
| city            | varchar(100)   | la ville de la propriété                   |
| zip_code        | varchar(50)    | le code postal de la propriété             |
| country         | varchar(100)   | le pays de la propriété                    |
| price_day       | int            | le prix par nuit de la propriété           |
| created_at      | date           | la date de création de l'annonce           |
| square_m        | int            | m² de la propriété                         |
| image           | varchar(255)   | l'image de la propriété                    |

## 🖥️ Utilisation

`index.php` affiche les propriétés disponibles sur le site  
`login.php` & `login_process.php` permettent à l'utilisateur de se connecter  
`register.php` & `register_process.php` permettent à l'utilisateur de s'inscrire  
`error.php` s'affiche si on rentre une donnée invalide  
`forgot.php` permet à l'utilisateur de changer son mot de passe  
`informations.php` permet à l'utilisateur de voir sa page de profil  
`logout.php` permet à l'utilisateur de se déconnecter  
`propertie.php` permet d'afficher la page de détails d'une propriété  
`settings.php` permet de modifier les informations de l'utilisateur
