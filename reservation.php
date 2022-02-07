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
<body >
    <?php

    include("navbar.php");
    require_once('./function/classe-reservation.php');
   
    $resa_solo = new Reservation(@$titre, @$description, @$debut, @$fin, @$id_user);
    $resa = $resa_solo->getResaSolo();
    ?>

    <main>
        <section>
            <div>
                <p class = centrer>
                    Title:
                    <?php
                    echo $resa[0]['titre'];
                    ?>
                </p>
                <p class = centrer>
                    Description:
                    <?php
                    echo $resa[0]['description']; 
                    ?>
                </p>
                <p class = centrer>
                    Beginning at:
                    <?php
                    echo $resa[0]['debut']; 
                    ?>
                </p>
                <p class = centrer>
                    Ending at:
                    <?php
                    echo $resa[0]['fin']; 
                    ?>
                </p>
            </div>
        </section>
        <section class = "section parallax bg2">
            <img src = "assets/salle_nb.jpg" alt= "modele">
        </section>
    </main>
</body>
</html>