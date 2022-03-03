# my_rest_api
#symfony 5.4 build
This is a symfony5.4 test project dev environment using a Docker repo.

Docker repo includes 4 Docker images that build 4 seperate docker containers:
Apache2/PHP8.1 
MYSQL8Server 
PHPMYADMIN
REDIS LAMP (REDIS NOT USED with this project)

Repo Docker build here:

https://github.com/yardpenalty/docker-compose-lamp.git

# symfony 5.4 setup
--check php local and dev env
//php -v
// run $ symfony local:php:list 
-- To control the version used in a directory, create a .php-version file that contains the 
version number ie: 8.1.3 in .php-version
// run $ symfony check:requirements
# create symfony 5.4 project
// run $ symfony new my_rest_api --version=5.4
//  cd my_rest_api/
# create git repo from project
//     $ git init
//     $ git add README.md
//     $ git commit -m "gitsetup"
-- create emtpy repo on github.com ie:my_rest_api
//     $ git remote add origin https://github.com/yardpenalty/my_rest_api.git
//     $ git branch -M main
//     $ git push -u main origin
//      github username and password:access token
     


NOTES: 

MYSQL_ROOT_PASSWORD=tiger

/my_project/.env 

DATABASE_URL="mysql://root:tiger@127.0.0.1:3306/my_project?serverVersion=8&charset=utf8mb4"

May have to install xml pkg

   $ sudo apt install php-xml

TODOS: setup fixtures for seeding
