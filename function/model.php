<?php
require_once ('database.php');

class Model {

    protected $pdo;
    protected $table;

    public function __construct() {
        $this->pdo = getpdo();
    }

    // public function find(){
    //     $find = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE `id` = ?");
    //     $find->execute([':id' => $id]);
    //     $reservation = $find->fetch();
    //     return $reservation;
    //     var_dump($reservation);
    // }

}