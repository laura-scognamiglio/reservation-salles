<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai+Looped:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
    include("navbar.php");
    require_once('./function/model.php');
    
    require_once('./function/classe-reservation.php');

    $resa = new Model();
    $resa_salle = new Reservation(@$titre, @$description, @$debut, @$fin, @$id_user);

$resa_salle->getReservation();

    ?>
        <main>
            <section class="horaire">

                <table class="struct">
                    <thead>
<!-- 
    ds le tbody une boucle pr l'amplitude horaire. / un td pour j.'oohoo' boucle sur les lignes. Séparer boucle du head et boucle du body 
    conditions pour afficher les td :  cellule vide cellule avc le contenu
 -->
                        <th></th>
                            <?php 
                            for ($i = 0; $i <7; $i ++): ?>
                                <th>
                                    <?=
                                    $test = $resa_salle->jours($i);
                                    
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
                                $reservation = $resa_salle->getReservationTime(date('Y-m-d',strtotime('Monday this week + '.$i. ' days')).' '. $j. 'h00');
                                if(isset($reservation[0]['titre'])) 
                                    {
                                    $titre = $reservation[0]['titre'];
                                    }
                                if(isset($reservation[0]['id'])) 
                                    {
                                    $id_resa = $reservation[0]['id'];
                                    }
                                
                                if(!empty($reservation)){
                                    echo "<td> <a href = 'reservation.php?id_resa=$id_resa' > $titre </a> </td>"; 
                                    
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

