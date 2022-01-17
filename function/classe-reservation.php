<?php

require_once('model.php');
require_once('func-register.php');
require_once('classe-user.php');


class Reservation extends Model{

    protected $table = "reservations";
  
    protected $titre; 
    protected $description;
    protected $debut;
    protected $fin;
   

    public function __construct( $titre, $description, $debut, $fin, $id_user){
        parent::__construct();
        
    }
    
    public function registerResa(){

        $user_connected = new Register(@$login, @$password);
        $user_connected->connect(@$login, @$password);
      
        $id_user = $_SESSION['user'];

        $read_resa_sql = ("SELECT * FROM `utilisateurs` WHERE `login`= '$id_user'");

        $read_resa = $this->pdo->prepare($read_resa_sql);
        $read_resa->execute();
        $resa = $read_resa->fetchAll();
       
        
        $id_resa_user = $resa[0]['id'];
        echo "<pre>";
        var_dump($resa );
        echo "<pre>";
      

        @$titre = $_POST['titre'];
        @$description = $_POST['desc'];
        @$debut = $_POST['debut'];
        @$fin = $_POST['fin'];
        
        if(isset($_POST['submit'])){

            $sql = "INSERT INTO {$this->table} (`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES (:titre , :description, :debut, :fin, :id_utilisateur)";

            $insert = $this->pdo->prepare($sql);
            $insert->execute(array(
                ":titre" => $titre, 
                ":fin" => $fin, 
                ":description" => $description,
                ":debut" => $debut,
                ":id_utilisateur" => $id_resa_user));
        
        echo "reservation successfully registered <br>";
        }
        
    }
   
}