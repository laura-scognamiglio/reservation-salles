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
       
        $hour_to_compare = $this->getReservationTime($debut);
        $creneau_exist = count($hour_to_compare);


        if(isset($_POST['submit']))
        {
// l'impossibilité de choisir une date antérieure. 
//comparer les deux dates en strtotime puis faire une comparaison entre le debut moins la fin si c'est positif c'est good, c'est envoyé en bdd
            $maintenant = $_SERVER['REQUEST_TIME'];
            $time_to_compare = strtotime($debut);

            $weekday = date("l", $time_to_compare );
            $normalized_weekday = strtolower($weekday);
            $hour = date("H", $time_to_compare);
          
           
            if($time_to_compare < $maintenant ) 
            {
                echo ("<p class = error> Don't choose a passed time </p>");
            }
// l'impossibilité de choisir une date durant le weekend.
// je formate la date en semaine avec date("l") et en minuscule avec strtolower
            else if(($normalized_weekday == "saturday") || ($normalized_weekday == "sunday"))
            {
                echo ("<p class = error> Not possible during the weekend</p>");
            }
// l'impossibilité de choisir une date durant avant 8h et après 19h.
// je formate la date en heure avec date(H) pour avoir un format sur 24h
            else if($hour < 8 || $hour > 19)
            {
               echo ("<p class = error>Choose between 8h00 and 19h00</p>");
            }
            else if($creneau_exist == 1)
            {
                echo ("<p class = error>Sorry, the room is already reserved</p>");
            }
            else 
            {
//2.exemple d'une table definis ds la classe et rappelé avc {$this->table} a utiliser pour le refactoring la prochaine fois <3
                $sql = "INSERT INTO {$this->table} (`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES (:titre , :description, :debut, :fin, :id_utilisateur)";

                $insert = $this->pdo->prepare($sql);
                $insert->execute(array(
                ":titre" => $titre, 
                ":fin" => $date_fin_insert, 
                ":description" => $description,
                ":debut" => $debut,
                ":id_utilisateur" => $id_resa_user));
                
                echo ("<p class = error>Reservation successfully registered </p>");
            }
        }        
    }

    public function jours($nombre_jour){

// la date d'aujourd'hui cette fonction me permet d'avoir les jours et mois en français sans avoir a parcourir un tableau 

//Langue locale souhaité 
        $locale = "fr_FR.UTF-8";
        
// premier IntlDateFormatter pour les jours, deuxième pour les heures, réglé sur none pour qu'elles n'apparaissent pas. 
 
        $formatter = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::NONE, "Europe/Paris");
        $dateFR = new DateTime("monday this week + $nombre_jour days");

 
        return $formatter->format($dateFR);

    }

    public function getReservationTime($creneau){

        $sql = "SELECT * FROM {$this->table} WHERE `debut` = :debut ";
        $getResa = $this->pdo->prepare($sql);
        $getResa->execute(array(":debut" => $creneau));
        $result = $getResa->fetchAll();
       
        return   $result;

    }


    public function getReservation(){

        $sql = "SELECT reservations.titre, reservations.description, reservations.debut, reservations.fin, utilisateurs.login, reservations.id_utilisateur, reservations.id FROM `reservations` INNER JOIN `utilisateurs` WHERE reservations.id_utilisateur = utilisateurs.id";
        
//on recup la resa avc l'id de l'user 

        $getResaUser = $this->pdo->prepare($sql);
        $getResaUser->execute();
        $result = $getResaUser->fetchAll();

  
    }        
    

    public function getResaSolo(){

//on recup la resa seule en fonction de l'id sur la page html planning on a indiqué ds le href le get avec 'reservation.php?id_resa=$id_resa'
        $id_resa = $_GET["id_resa"];
        $sql_resa = "SELECT * FROM {$this->table} WHERE id = '$id_resa'";
        $get_resa = $this->pdo->prepare($sql_resa);
        $get_resa->execute();
        $result_resa = $get_resa->fetchAll();


        return $result_resa;
    }       

    
}