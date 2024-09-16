<p align="center"><a href="https://github.com/user-attachments/assets/6d4d0214-f563-4164-a482-917dbdaf636a" target="_blank"><img src="https://github.com/user-attachments/assets/6d4d0214-f563-4164-a482-917dbdaf636a" width="400" alt="Plusquepro movies"></a></p>

## Installation

Suivre les étapes suivantes pour une utilisation en local :

- Cloner le repository
- Lancer les commandes `composer install` et `npm install`
- Dans le fichier .env, rajouter et compléter les variables TMDB_API_KEY (voir PDF), TMDB_BASE_URL (https://api.themoviedb.org/3/) et TMDB_IMAGES_URL (https://image.tmdb.org/t/p/original/)
- Lancer les migrations via la commande `php artisan migrate` (ou `sail artisan migrate` si utilisation de Docker)
- Lancer la commande (php/sail) `artisan movies:trending` pour importer les films tendances du jour
- Lancer les commandes `php artisan serve` + `npm run dev` | `sail up` + `sail npm run dev`
- Créer un compte via le bouton "Register" situé en haut à droite
- Enjoy 🍿