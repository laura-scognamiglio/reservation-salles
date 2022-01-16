<?php

require_once('model.php');

class Reservation extends Model{

    protected $table = "reservations";
    // protected $id;
    protected $titre; 
    protected $description;
    protected $debut;
    protected $fin;
    // protected $id_user;

    public function __construct( $titre, $description, $debut, $fin){
        parent::__construct();
        
    }
    
    // public function getId(){
    //     return $this->id;
    // }
    //  public function setId(){
    //     $reservation = $this->find();
    //     if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    //             $id = trim($_GET['id']);
    //         }
    //             if (!$id) {
    //             die("Vous devez préciser un paramètre `id` dans l'URL !");
    //         }
    //  return $id;
    //  var_dump($id);
    // }
    // public function find(){
    //     $id = $this->setId();
    //     $find = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE `id` = :id");
    //     $find->execute([':id' => $id]);
    //     $reservation = $find->fetch();
    //     return $reservation;
    //     var_dump($reservation);
    // }

    public function registerResa(){

        @$titre = $_POST['titre'];
        @$description = $_POST['desc'];
        @$debut = $_POST['debut'];
        @$fin = $_POST['fin'];

        
        if(isset($_POST['submit'])){
            $sql = "INSERT INTO {$this->table} (`titre`, `description`, `debut`, `fin`) VALUES (:titre , :description, :debut, :fin)";

        $insert = $this->pdo->prepare($sql);
        $insert->execute(array(
            ":titre" => $titre, 
            ":fin" => $fin, 
            ":description" => $description,
            ":debut" => $debut));
        
        echo "reservation successfully registered <br>";
        }
        
    }
   
}