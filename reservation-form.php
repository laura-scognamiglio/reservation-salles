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
    require_once('./function/classe-reservation.php');

    @$id_user = $_SESSION['id'];
    @$titre = $_POST['titre'];
    @$description = $_POST['desc'];
    @$debut = $_POST['debut'];


    @$resa = new Reservation(@$titre, @$description, @$debut, @$fin, @$id_utilisateur);
    $resa->registerResa($titre, $description, $debut, @$fin, @$id_utilisateur);
    
    ?>
<main>
    <section class= "formulaire">

        <form class= "formIns"  action= "" method= "post">
            <div class= "form-group">
                <label class= "sous-titre" for="story">Titre:</label><br>
                <input type= "text" name= "titre" placeholder= "titre" autocomplete= "off">
            </div>
            <div class= "form-group">
            <label class= "sous-titre" for="story">Descriptions:</label><br>
                <textarea id="story" name="desc"
                        rows="4" cols="24">
                </textarea>
            </div>
            <div class= "form-group">
            <label class= "sous-titre" for="start">date début:</label><br>
                <input type="datetime-local" id="meeting-time"
                    name="debut" value=""
                    min="2022-01-01T08:00" max="2022-31-12T18:00" step="3600" >
            </div>
            <div class= "form-group">
           
            <div class="form-group">
                <button type="submit" name= "submit" class="btn ">Valider</button>
            </div> 
        </form>
    </section>
    <section class = "section parallax bg2">
            <img src = "assets/artiste.jpg" alt= "modele">
    </section>
</main>

</body>
</html>