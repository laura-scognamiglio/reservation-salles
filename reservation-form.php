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
        @$titre = $_POST['titre'];
        @$description = $_POST['desc'];
        @$debut = $_POST['debut'];
        @$fin = $_POST['fin'];
    $resa = new Reservation($titre, $description, $debut, $fin);
    $resa->registerResa($titre, $description, $debut, $fin);
    
    ?>
<main>
    <section>

        <form class= "formIns"  action= "" method= "post">
            <div class= "form-group">
                <label for="story">Titre:</label><br>
                <input type= "text" name= "titre" placeholder= "titre" autocomplete= "off">
            </div>
            <div class= "form-group">
            <label for="story">Descriptions:</label><br>
                <textarea id="story" name="desc"
                        rows="4" cols="20">
                </textarea>
            </div>
            <div class= "form-group">
            <label for="start">date début:</label><br>
                <input type="datetime-local" id="meeting-time"
                    name="debut" value=""
                    min="2022-01-01T00:00" max="2022-31-12T00:00">
            </div>
            <div class= "form-group">
            <label for="start">date fin:</label><br>
                <input type="datetime-local" id="meeting-time"
                    name="fin" value=""
                    min="2022-01-01T00:00" max="2022-31-12T00:00">
            </div>
            <div class="form-group">
                <button type="submit" name= "submit" class="btn ">Valider</button>
            </div> 
        </form>

        
    </section>
</main>

</body>
</html>