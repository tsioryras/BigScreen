## Installer l'application

Pour l'installation, allez dans le répertoire de votre choix et ouvrez-y votre 
console ou invite de commande.

Ensuite lancer la commande :
- git clone https://github.com/tsioryras/we_fashion.git
- ou téléchargez le fichier bigscreen.zip

Une fois le téléchargement fini, lancez votre serveur local et modifier le fichier .env en fonction de votre environnement.


Pour pouvoir utiliser l'application, déplacez-vous dans le dossier de l'application 
puis éxecutez le commandes suivantes:
- php artisan key:generate (pour regénérer une API_KEY si besoin )
- composer install
- npm install
- npm run dev
- php artisan db:seed --class=DatabaseSeeder
- php artisan serve

Enfin, ouvrez votre navigateur tapez dans votre barre d'addresse http://127.0.0.1:8000

Si vous voulez réinitialiser les données, éxécutez la commande:
- php artisan migrate:refresh --seed

 
##Outils et languages

PHPSTORM, WAMPSERVER, CMDER

PHP, JS, HTML, REACT, BLADE, MATRIX-ADMIN, BOOTSTRAP

## Guest User
Pour les utilisateurs lambda, il suffit de repmlir le formulaire et de valider.
Ensuite, un lien pour voir les réponses sera afficher.

## Admin User
Le seul administarteur est le seul à pouvoir se connecter. Pour cela, il aura les identifiants suivant:

- email: admin@bisscreen.bs
- mot de passe : 123456789