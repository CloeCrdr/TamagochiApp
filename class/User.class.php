<?php
require_once('../DB/Database.class.php');

#[AllowDynamicProperties]
class User
{

    public string $id;
    public string $username;

    // public function __construct($name)
    // {
    //     $this->username = $name;
    // }


    public static function getByName(string $name) : static | false 
    {
        $pdo = Database::getDatabase();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :name",['name' => $name]);
        $stmt->bindValue("name", $name, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $stmt->fetch();
    }

    public static function getById(int $id) : static | false
    {
        $pdo = Database::getDatabase();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id",['id' => $id]);
        $stmt->bindValue("id", $id, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $stmt->fetch();
    }

    public function insert($name)
    {
        $pdo = Database::getDatabase();
        $sql= "CALL CREATE_USER('$name')";
        $stmt = $pdo->prepare($sql);
        $res = $stmt->execute();
        return $res;
    }
}
