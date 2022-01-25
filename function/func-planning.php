<?php

require_once('model.php');
// require_once('func-register.php');
// require_once('classe-user.php');

// classe pour les semaines; PHP 8 me permet de typer les param directements ds le construct
// les trois en int car ils sont compris entre 1 et 12 pour les mois, 0 à 6 pour les jours et 8 et 19 pour les heures
  

function Planning( $jour, $mois){

     $mois_traduits = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Novembre', 'Décembre'];

     $jour_traduits = array(0=>'Lundi', 1=>'Mardi', 2=>'Mercredi', 3=>'Jeudi',4=>'Vendredi', 5=>'Samedi', 6=>'Dimanche');

        
     
        // $date = new DateTime();

        // $semaine = date("W");
        $jour = date("d", strtotime('Monday this week'));
        // $mois = date("m");
        // $heure = date("h");

        if ($jour_traduits < 0 || $jour_traduits > 6){
            throw new Exception("le jour est invalide");
        }
        if ($mois < 1 || $mois > 12){
            throw new Exception("le mois est invalide");
        }
        // if ($heure < 8 || $heure > 19){
        //     throw new Exception("l'horaire est invalide");
        // }
        

        // $this->mois_traduits = $mois;
        // $this->jour_traduits = $jour;
        // return()
        
}

//retourne les mois en lettres 
function toString(): string{

    // $weekMondayTime = strtotime('Monday this week');

}


// 1 faire le header du planning en premier avc une première boucle 
//pas de classe pour le planning en verité, mais faires appel aux méthodes de la classe qui m'as permis de reservervé les dates
