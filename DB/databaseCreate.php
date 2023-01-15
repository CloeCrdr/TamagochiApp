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
            new Column("faim", "int(2)", "not null"),
            new Column("soif", "int(2)", "not null"),
            new Column("ennui", "int(2)", "not null"),
            new Column("sommeil", "int(2)", "not null"),
            new Column("living",  "int(2) ", "not null"),
            new Column("user_id", "int unsigned", "not null"),
            new Column("level", "int unsigned", "not null"),
            new Column("created_at", "datetime", "not null"),
            new Column("last_update", "datetime", "not null")
        ],' CHECK (faim < 100)'),
        new Table("actions", "id", [
            new Column("id", "int unsigned", "not null auto_increment"),
            new Column("action_name", "varchar(255)", "not null"),
        ]),
        new Table("tamagotchis_actions", "id", [
            new Column("id", "int unsigned", "not null auto_increment"),
            new Column("action_id", "varchar(255)", "not null"),
            new Column("tamagotchi_id", "varchar(255)", "not null"),
            new Column("date", "datetime", "not null"),
        ]),
    ]);
    Database::bulkInsert('actions',['action_name'],[['eat'],['drink'],['bedtime'],['enjoy']]);
    Database::createSqlsProcedures();
    Database::triggersTamagosAction();
    header('Location: ../views/components/success.php');
} catch (Exception $e) {
    $e->getMessage();
    header('Location: ../views/components/error.php');
}


