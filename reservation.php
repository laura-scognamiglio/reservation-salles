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
    require_once('./function/classe-reservation.php');
   
    $resa_solo = new Reservation(@$titre, @$description, @$debut, @$fin, @$id_user);
    // $resa_solo->getResaSolo();
    $resa = $resa_solo->getResaSolo();
    ?>

    <main>
        <section>
            <div>
                <p>
                    <?php
                    echo $resa[0]['titre'];
                    ?>
                </p>
                <p>
                    <?php
                    echo $resa[0]['description']; 
                    ?>
                </p>
                <p>
                    <?php
                    echo $resa[0]['debut']; 
                    ?>
                </p>
                <p>
                    <?php
                    echo $resa[0]['fin']; 
                    ?>
                </p>
            </div>
        </section>
    </main>
</body>
</html>