<?php 
require_once './class/User.class.php';
require_once './DB/Database.class.php';

// function to create user 
$userInsert = Database::bulkInsert('users',["username"],[["Centaure chris"]]);
var_dump($userInsert);

