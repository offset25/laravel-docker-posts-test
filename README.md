# to install

Prerequisites
docker
git bash (if you have windows)


on windows
use powershell

to pull repo files (make sure you have added your ssh key to github account to access private repos otherwise will show no access)

in windows run 
.\docker\scripts\git-clone.bat

in mac/linux run 
sh ./docker/scripts/git-clone.bat



to initialize docker containers then run the following (This is only suppose to be run on initialization)

in windows:
.\docker\scripts\init-docker.bat


in mac/linux:
use terminal
sh docker/scripts/init-docker.sh


#to start docker run
docker-compose up -d


#to stop docker run
docker-compose down



#containers

web container
http://localhost:9215

to terminal into instance
docker exec -it posts-test-web-app /bin/bash

to force rebulid container and restart
docker-compose build --no-cache posts-test-web-app
docker-compose down
docker-compose up -d



phpmyadmin
http://localhost:9216

to use phpmyadmin use db credentials from docker-compose.yml
L:root
P:oi34@#SSOAdjs

this is only for dev testing so not used for production


db:
to terminal into mysql
docker exec -it posts-test-db /bin/bash


DB MIGRATIONS:
to run migration do
docker exec -it posts-test-app php artisan migrate

this must be done in powershell if running in windows



Troubleshooting
If for some reason containers won't start then restart docker.
If for some reason containers are not running or showing node errors not finding libraries then reset all using

run:
docker/scripts/reset-all-docker.bat


if getting max depth exceeded then run
docker rmi -f $(docker images -a -q)


Project Description
Our coding exam is meant to understand your level of coding knowledge and your coding habits. There is not a “right” way to complete this exam project and no trick questions. We are primarily looking for good design patterns, coding practices, and robust workflow. We hope you enjoy helping us gain an understanding of your current level of coding knowledge and how you write code.

We are always learning and improving at PT United, please be as honest as possible with your work units. It is important that we all have a clear understanding of our coding standards.

Here are the guidelines to complete the assessment:
    1. This test will be utilizing laravel 6.0 running in Homestead. A quick setup can be found here https://laravel.com/docs/6.x/homestead.
    2. The project should include all relevant code to run locally.
    3. You will be creating a basic app to manage posts.
    4. Create an interface to create, update, remove, and restore Posts.
        a. Posts should have:
            i. Model name Post
            ii. Title
            iii. Content
            iv. created, updated, and deleted timestamps
    5. Additionally, the the user should be able to sort the display order of these post by
        a. Title length.
        b. Post with content that contains the letter q only.
    6. Once done push the whole project to a public GitHub repository
    7. Share the repository with us, so we can see your work.
