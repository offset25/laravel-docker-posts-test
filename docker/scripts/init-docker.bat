rem docker-compose build --no-cache posts-test-app
docker-compose build posts-test-app
docker-compose up -d
docker-compose exec posts-test-app cp /var/www/docker/app/.env /var/www/.env
docker-compose exec posts-test-app composer install
docker-compose exec posts-test-app php artisan key:generate
docker-compose exec posts-test-app php artisan migrate --seed
docker-compose exec posts-test-app php artisan config:cache
rem docker exec -i posts-test-db sh /root/sample-db/import.sh
docker-compose exec posts-test-app php artisan migrate
exit


rem docker exec -it podeffect-app /bin/bash
