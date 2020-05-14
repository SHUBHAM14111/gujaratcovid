## Gujarat covid gmaps locator



## About Covidgujarat 

Covidgujarat is a web application devloped in vuejs/laravel.  Application is in development phase which will be using google maps api to locate the patients of covid19
and also provide the accurate marking of the hotspots so that the users are alerted before any adventure

- vuejs:Frontend
- laravel/php:Backend
- mysql:Database
- jwt based authentication
- file:cachedrive


GujaratCovid is accessible, neat, and provides clear structure of the case and presentation

## Procedure to setup project in system
### Run this commands step by step
```bash
git clone https://github.com/DhruvikDonga/gujaratcovid.git
cd gujaratcovid

composer install

npm install

copy .env.example .env

php artisan key:generate

php artisan migrate

php artisan db:seed   

php artisan jwt:secret
```
### Note:-admin registration is disabled so seed the user in database by seeding





## License

The GujaratCovid software codebase licensed under the addon solutions
