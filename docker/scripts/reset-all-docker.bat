docker-compose down &
docker-compose build --no-cache posts-test-app
docker-compose up -d
#docker exec -it posts-test-app npm install
