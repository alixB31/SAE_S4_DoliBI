# DoliBI

## Description :

Nous sommes un groupe d'étudiants réalisant un projet dans le cadre de notre deuxième année de BUT informatique.  
Ce projet a pour but de créer une application Web destinée à améliorer la plateforme Dolibarr. Dans notre projet, les utilisateurs se sont aperçus de manuqes dans le logiciel Dolibarr. Grâce au cahier des charges fournit pas les utilisateurs, nous allons concevoir une solution qui répondront aux exigences des utilisateurs. 

## Equipe & Rôles :

Nael Briot       ==> aurorakali ==> nael.briot@iut-rodez.fr

Alix Brugier     ==> alixB31  ==> alix.brugier@iut-rodez.fr

Rayan Ibrahime   ==> Bratoun  ==> rayan.ibrahime@iut-rodez.fr


**Sprint 0 :**

Product Owner : Nael Briot    
Scrum Master : Rayan Ibrahime   
Equipe de developpement : Nael Briot, Alix Brugier, Rayan Ibrahime   


**Sprint 1 :**

Product Owner : BRUGIER Alix  
Scrum Master : Nael Briot   
Equipe de developpement : Nael Briot, Alix Brugier, Rayan Ibrahime  

**Sprint 2 :**

Product Owner : Rayan Ibrahime    
Scrum Master : BRUGIER Alix   
Equipe de developpement : Nael Briot, Alix Brugier, Rayan Ibrahime  

## Liens : 
Lien site web : dolibi.alwaysdata.net
Lien github : https://github.com/alixB31/SAE_S4_DoliBI.git
Lien Google Drive : https://drive.google.com/drive/u/1/folders/0ADwnN94XsF_3Uk9PVA

## Installation de l'application en local avec Docker
docker-compose up -d
docker-compose exec SAE_S4_DoliBI composer update

## Liens du site en local
http://localhost:8080/dolibi/

## Commande pour réaliser les tests

docker-compose exec SAE_S4_DoliBI bash

PHPStan

$ php ./dolibi/lib/vendor/bin/phpstan --xdebug analyse -c ./phpstan.neon

tests (without coverage)

$ php ./dolibi/lib/vendor/bin/phpunit

tests with coverage

$ php -d xdebug.mode=coverage ./dolibi/lib/vendor/bin/phpunit  --coverage-html='reports/coverage'

