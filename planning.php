<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("navbar.php");
    require_once('./function/model.php');
    
    require_once('./function/classe-reservation.php');

    $resa = new Model();
    $resa_salle = new Reservation(@$titre, @$description, @$debut, @$fin, @$id_user);

    // $resa_salle->getReservation();

    ?>
        <main>
            <section class="horaire">
                <!-- <button><a href="planning.php?prev">Précedent</a></button>
                <button><a href="planning.php?next">Suivant</a></button> -->
                <table class="struct">
                    <thead>
<!-- 
    ds le tbody une boucle pr l'amplitude horaire. / un td pour j.'oohoo' boucle sur les lignes. Séparer boucle du head et boucle du body 
    conditions pour afficher les soit une cellule vide soit une cellule avc le contenu
 -->
                        <th></th>
                            <?php 
                            for ($i = 0; $i <7; $i ++): ?>
                                <th>
                                    <?=
                                    $resa_salle->jourTraduits($i);
                                    ?>
                                </th>
                            <?php endfor; ?>
                    </thead>
                    <tbody>
                        <?php 
                            for ($j = 8;  $j <19 ; $j ++): ?>
                              <tr> 
                                <td><?= $j . "h00" ?></td>
                                <?php
                                for ($i = 0; $i <7; $i ++){
                                // $resa_salle->setWeek($week);
                                $reservation = $resa_salle->getReservation(date('Y-m-d',strtotime('Monday this week + '.$i .' days')).' '. $j. 'h00');
                            
                                if(!empty($reservation)){
                                    echo '<td> Reservée :) </td>';
                                    
                                    }else{
                                        echo '<td> </td>';
                                    }
                                    
                                }
                                    ?>
                               </tr>          
                        <?php endfor; ?> 
                    </tbody>
                </table>
            </section>
        </main>
    </body>
</html>

