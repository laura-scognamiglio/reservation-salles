<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai+Looped:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php

    include("navbar.php");
    require_once('./function/func-register.php');
    require_once('./function/database.php');
    require_once('./function/model.php');
   
    $user = new User(@$login, @$password);
    $user = new Register(@$login, @$password);
    $pdo = new Model();
    $user->registerIn(@$login, @$password);

    ?>
    <section class= "formulaire">
        <h2 class= "sous-titre" >Inscription</h2>
        <form class= "formIns"  action= "inscription.php" method= "post">
        
                <div class= "form-group">
                    <input type= "text" name= "login" placeholder= "login" autocomplete= "off">
                </div>
                <div class= "form-group">
                    <input type= "password" name= "password" placeholder= "password" autocomplete= "off">
                </div>
                <div class= "form-group">
                    <input type= "password" name= "confirm" placeholder= "confirm password" autocomplete= "off">
                </div>
                <div class="form-group">
                    <button type="submit" name= "submit" class="btn ">Valider</button>
                </div> 
        </form>
    </section>
    <section class = "section parallax bg2">
            <img src = "assets/artiste peintre.jpg" alt= "modele">
            <h1>Atelier Miraje</h1>
    </section>
</body>
</html>
