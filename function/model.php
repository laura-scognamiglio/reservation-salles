<?php
require_once ('database.php');

class Model {

    protected $pdo;

    public function __construct() {
        $this->pdo = getpdo();
    }

    // return $pdo;

}