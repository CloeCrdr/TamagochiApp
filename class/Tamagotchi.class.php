<?php 
require_once('../DB/dbConn.php');

#[AllowDynamicProperties]
class Tamagotchi {

    public int $id;
    public string $name; 
    public int $faim; 
    public int $soif; 
    public int $ennui; 
    public int $sommeil;
    public int $user_id;
    public int $level;
    public bool $living;
    public string $created_at; 
    public string $last_update; 

    // public function __construct($name,$user_id)
    // {
    //     $this->name = $name;
    //     $this->faim = 70;
    //     $this->soif = 70;
    //     $this->ennui = 70;
    //     $this->sommeil = 70;
    //     $this->user_id = $user_id;
    //     $this->level = 1;
    //     $this->living = true;
    //     $this->created_at = date('Y-m-d H:i:s');
    // }


    public static function getAllUserTamagos(int $id) : ?static
    {
        $pdo = Database::getDatabase();
        $stmt = $pdo->prepare("SELECT * FROM tamagotchi WHERE user_id = :id",['id' => $id]);
        $stmt->bindValue("id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);

        return $stmt->fetch();
    }


}