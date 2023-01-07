<?php 

class Tamagotchi {

    private int $id;
    private string $name; 
    private int $faim; 
    private int $soif; 
    private int $ennui; 
    private int $sommeil;
    private int $user_id;
    private int $level;
    private bool $living;
    private string $created_at; 
    private string $last_update; 

    public function __construct($name,$user_id)
    {
        $this->name = $name;
        $this->faim = 70;
        $this->soif = 70;
        $this->ennui = 70;
        $this->sommeil = 70;
        $this->user_id = $user_id;
        $this->level = 1;
        $this->living = true;
        $this->created_at = date('Y-m-d H:i:s');
    }


}