<?php
require_once ('database.php');

class Model {

    protected $pdo;
    protected $table;

    public function __construct() {
        $this->pdo = getpdo();
    }

}