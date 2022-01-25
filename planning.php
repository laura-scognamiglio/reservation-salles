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
                        <td></td>
                        <td>
                            <th>
                                <?php for ($i = 0; $i <7; $i ++): ?>

                                    <?= date("d-m-Y ", strtotime('monday this week + '.$i.' days'));  ?>
                                <?php endfor; ?>
                            </th>
                        </td>
                    </thead>
                    <tbody>
                        <td>
                            <?php for ($j = 0; $j <20 && $j >7; $j ++): ?>
                                <?= date("H-i-s  ");  ?>
                            <?php endfor; ?>
                        </td>
                    </tbody>
                </table>
            </section>
        </main>
    </body>
</html>