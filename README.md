# tamagochi_app

## Initialize the project 

#### Download project

To start the project, please download it by using the following repository : https://github.com/CloeCrdr/TamagochiApp/

#### Create and connect to database

First of all please add your database information to the Database.class.php file (./DB/Database.class.php -> getDatabase())

You can create your database by : 
- Going to the following link : http://localhost/TamagochiApp/DB/databaseCreate.php
- Using the dump on the requirements folder

#### Start project

To start the project and create a new user follow the link : http://localhost/TamagochiApp/views/create_account.php
 
To go to your login page follow the link : http://localhost/TamagochiApp/views/select_account.php

And enjoy your tamagotchi app ! :)

## Project specificities 

### Screens 

- Create an account (create_account.php)
- Select an account (select_acocunt.php)
- List of tamagotchi (tamagochi_list.php + tamagochi_new.php)
- Actions on a tamagotchi (takecareof.php)
- Tamatochis graveyard (graveyard.php)

### SQL contraints 
- procedures
- triggers

### Backends's technical contraints 
#### Datebase interactions

- Class or content to generate database
- Statistics on tamagotchis needs' levels 

#### Limitations 
 
- Backend language : PHP
- No library
- No conteneurization 

### Rendering and correction

- CODE : tamagochiApp
- Database Diagram : requirements/database_diagram/diagramtamagotchi.html
- Database Dump : requirements/dump_sql/tamagotchiProject.sql
- Documentation : requirements/documentation/doc.md
- PHPDocs and comments
