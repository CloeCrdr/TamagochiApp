<?php

#[AllowDynamicProperties]
class Action {

    public int $id;
    public string $action_name;

    public function getAll()
    {
        $pdo = Database::getDatabase();
        $stmt = $pdo->prepare("SELECT * FROM actions");
        $stmt->execute();
        $res = $stmt->fetchAll();
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);

        return $res;
    }

    public function insert($userId,$actionId)
    {
        $pdo = Database::getDatabase();
        $sql= "CALL CREATE_TAMAGOCHI('$name',$userId)";
        $stmt = $pdo->prepare($sql);
        $res = $stmt->execute();
        return $res;
    }

    
}