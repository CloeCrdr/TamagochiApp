<?php

require_once './Database.class.php';

// Début du code
if (Database::doesDatabaseExist("tamagotchiProject")) {
    Database::dropDatabase("tamagotchiProject");
}


try {
    Database::migrate("tamagotchiProject", [
        new Table("users", "id", [
            new Column("id", "int unsigned", "not null auto_increment"),
            new Column("username", "varchar(255)", "not null"),
        ]),
        new Table("tamagotchi", "id", [
            new Column("id", "int unsigned", "not null auto_increment"),
            new Column("name", "varchar(255)", "not null"),
            new Column("faim", "int unsigned", "not null"),
            new Column("soif", "int unsigned", "not null"),
            new Column("ennui", "int unsigned", "not null"),
            new Column("sommeil", "int unsigned", "not null"),
            new Column("living",  "int unsigned", "not null"),
            new Column("user_id", "text", "not null"),
            new Column("level", "int unsigned", "not null"),
            new Column("created_at", "datetime", "not null"),
            new Column("last_update", "datetime", "not null")
        ]),
    ]);
    print 'Success create Database!';
} catch (Exception $e) {
    $e->getMessage();
    print 'Failed create Database! <br />';
}

