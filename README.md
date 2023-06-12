# Hackathon



## Mise en route
 - Installer les dépendances avec la commande suivante:

     docker run  --rm  \
    -u "$(id -u):$(id -g)"  \
    -v "$(pwd):/var/www/html"  \
    -w /var/www/html  \
    laravelsail/php82-composer:latest \
    composer install  --ignore-platform-reqs
    
 - Créer un fichier .env en copiant le contenu du fichier .env.example
 - Créer un alias pour faciliter les commande suivantes : 

    alias  sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

 -  Lancer la commande `sail up -d && sail composer && sail npm i` pour lancer l'environnement et installer les dépendances
 - Lancer la commande `sail artisan key:generate` pour générer une clé
 - Lancer la commande `sail artisan migrate:fresh --seed` pour lancer toutes les migrations et les seeders
 
 L'application devrait être accessible depuis `http://localhost/`. Un service Adminer est également disponible pour visualiser la base de données à l'adresse  `http://localhost:8080/`.
 Pour vous connecter avec les différents profils, vous pouvez utiliser les comptes associés à ces mails :
 

 - RH: hr_manager@test.com
 - Commercial : commercial@test.com
 - Développeur : developer0@test.com (d'autres comptes développeurs sont accessibles en changeant le "0" par un chiffre de 1 à 9)

Le mot de passe pour tous ces comptes est **admin**

## Liste des fonctionnalités

Pour le développeur :
 - Récupération et analyse du niveau du développeur en chaque langage via l'API Codewars
 - Système de point (CarbonScore) accumulable via la complétion de challenges Codewars et la participation à des formations
 - Système de récompenses par palier : accumuler un certain nombres de points débloque un palier de récompenses, le développeur peut alors choisir parmi celles qui lui sont proposées
 - Visualisation du suivi de son niveau en chaque langage
 - Classement général (via le CarbonScore) et par langage

Pour le RH :
- Voir les développeurs
- Les filtrer par langage
- Voir les différents profils
- Modifier le statut d'un développeur
- Voir le classement des développeurs
- Ajouter des formations
- Voir les participants aux formations

Pour le commercial :

 - Voir les développeurs
 - Les filtrer par langage
 - Voir les différents profils
 - Voir le classement des développeurs
 - Modifier le statut d'un développeur
