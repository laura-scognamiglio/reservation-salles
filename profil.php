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
    require_once('./function/func-register.php');
    require_once('./function/database.php');
    require_once('./function/model.php');
 
    $user = new Register(@$login, @$password);
   
    if(isset($_POST['update'])){
        $user->updateUser($_POST['newlogin'], $_POST['newpassword'],$_SESSION['user']);
    }
   
    ?>

    <main>
        <section class= "formulaire">
                <h2 class= "sous-titre" >Profil de <?php echo $_SESSION['user'] ?> </h2>
                <form class= "formIns" action= "profil.php" method= "post">
                
                        <div class= "form-group">
                            <input type= "text" name= "newlogin" placeholder= "new login" autocomplete= "off">
                        </div>
                        <div class= "form-group">
                            <input type= "password" name= "newpassword" placeholder= "*****" autocomplete= "off">
                        </div>
                        <div class="form-group">
                            <button type="submit" name= "update" class="btn ">Update</button>
                        </div> 
                </form>
        </section>
        <section class = "section parallax bg2">
            <img src = "assets/artiste peintre.jpg" alt= "modele">
        </section>
    </main>
</body>
</html>