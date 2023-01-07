<?php

class User
{

    private string $id;
    private string $username;

    public function __construct($name)
    {
        $this->username = $name;
    }

    private static function create_user($username)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * from users");
        $stmt->execute();
        var_dump($stmt);
    }

    
}
