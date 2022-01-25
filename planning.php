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
    require_once('./function/func-planning.php');
    require_once('./function/classe-reservation.php');

    $resa = new Model();

    $resa_salle = new Reservation($titre, $description, $debut, $fin, $id_user);

    $resa_salle->modifResa();
   

    // $date_resa = new Semaine('1', '8');
    // $date_resa->toString();

    // $resa->setId();
    // $resa->find();
    ?>

        <main>
            <section class="horaire">
                <table class="struct">
                    <thead>
                        <th></th>
                            <?php for ($i = 0; $i <7; $i ++): ?>
                                <th>
                                    <?= date("d-m-Y ", strtotime('monday this week + '.$i.' days'));  ?>
                                </th>
                            <?php endfor; ?>
                    </thead>
                    <tbody>
                        <?php 
                            for ($j = 8;  $j <19 ; $j ++): ?>
                              <td> <?= $j . "h00" ?>
                                    <tr></tr>
                               </td>          
                        <?php endfor; ?> 
                    </tbody>
                </table>
            </section>
        </main>
    </body>
</html>

<!-- 
    ds le tbody une boucle pr l'amplitude horaire
    un td pour j.'oohoo'
    boucle sur les lignes 
    conditions afficher les cellules ou pas 
 -->