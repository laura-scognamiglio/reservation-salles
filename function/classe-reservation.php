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
        // echo "<pre>";
        // var_dump($resa );
        // echo "<pre>";
      
 // pour inserer ds la database un crenau d'une heure et au format de la bdd. 
        @$titre = $_POST['titre'];
        @$description = $_POST['desc'];
        @$debut = $_POST['debut'];
       
        
        $date_fin = $debut;
        $date_fin_insert = strtotime($date_fin . "+1hour");
        $date_fin_insert = date('Y-m-d H:i', $date_fin_insert);
        
        if(isset($_POST['submit'])){

            $sql = "INSERT INTO {$this->table} (`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES (:titre , :description, :debut, :fin, :id_utilisateur)";

            $insert = $this->pdo->prepare($sql);
            $insert->execute(array(
                ":titre" => $titre, 
                ":fin" => $date_fin_insert, 
                ":description" => $description,
                ":debut" => $debut,
                ":id_utilisateur" => $id_resa_user));
        
        echo "reservation successfully registered <br>";
        }
        
    }

    public function modifResa(){

        // date_default_timezone_set('Europe/Paris');
        // $time = time();

        // $d = new DateTime( 'NOW' );
        // $d = date("d-m-Y ", strtotime('monday this week '));
        
        // echo $d;

        // $jour_traduits = array(0=>'Lundi', 1=>'Mardi', 2=>'Mercredi', 3=>'Jeudi',4=>'Vendredi', 5=>'Samedi', 6=>'Dimanche');
               // $date = date("d-m-Y ", strtotime('monday this week '));


// la date d'aujourd'hui 
        $locale = "fr_FR.UTF-8";
        $formatter = new IntlDateFormatter($locale, IntlDateFormatter::MEDIUM, IntlDateFormatter::NONE, "Europe/Paris");
        $dateFR = new DateTime("NOW");

        // $dateFR = 
        
        echo $formatter->format($dateFR);

        // var_dump($date);
        return $dateFR;

        
            
    }

    
}