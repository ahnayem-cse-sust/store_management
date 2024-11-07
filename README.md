##Migration Command

#migrate specific migration 
php artisan migrate  --path=/database/migrations/selected
#For Cache clear
1. php artisan route:cache
2. php artisan cache:clear
3. php artisan optimize
#remove controller cache laravel
php artisan queue:restart
#Laravel cache was on the way of the package reading the new published vendor config.
php artisan config:clear 