<?php

require_once('model.php');
require_once('func-register.php');
require_once('classe-user.php');


class Reservation extends Model{

//pour un futur projet en MVC avoir un attribut qui peux être redefinis selon les tables dont les méthodes ont besoin me permettra de bien refactoriser mon code! Une requete avc table amovible...super cool!
//1.definir l'attribut avc la table utilisée. 
//2.appeler l'attribut ds la requette voir exemple  

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
       
      
// pour inserer ds la database un crenau d'une heure et au format de la bdd. 
        @$titre = $_POST['titre'];
        @$description = $_POST['desc'];
        @$debut = $_POST['debut'];
       
// rajout d'une heure a l'heure du début pour avoir précisement le bon creneau 
        $date_fin = $debut;
        $date_fin_insert = strtotime($date_fin . "+1hour");
        $date_fin_insert = date('Y-m-d H:i', $date_fin_insert);
        
        if(isset($_POST['submit'])){

//2.exemple d'une table definis ds la classe et rappeler avc {$this->table}
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

    public function jourTraduits($nombre_jour){

// la date d'aujourd'hui cette fonction me permet d'avoir les jours et mois en français sans avoir a parcourir un tableau 

//Langue locale souhaité 
        $locale = "fr_FR.UTF-8";
        
// premier IntlDateFormatter pour les jours, deuxième pour les heures, réglé sur none pour qu'elles n'apparaissent pas. 
// la méthode va prendre en paramètre une variable qui est ds une boucle qd on va l'appeler elle prendra la variable de la boucle. 
        $formatter = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::NONE, "Europe/Paris");
        $dateFR = new DateTime("monday this week + $nombre_jour days");
//mettre dans le return toute la procudure et pas juste le resultat comme ça on peut déclarer la méthode ou l'on veut <3 ! 
        return $formatter->format($dateFR);

    }

    
}