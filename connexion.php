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
    require_once('./function/func-register.php');
    require_once('./function/database.php');
    require_once('./function/model.php');

 
    $user = new User(@$login, @$password);
    $user = new Register(@$login, @$password);
    $pdo = new Model();

    $user->connect(@$login, @$password);
    
    ?>
    <section class= "formulaire">
                <h2 class= "sous-titre" >Connexion</h2>
                <form class= "formIns" action= "connexion.php" method= "post">
                
                        <div class= "form-group">
                            <input type= "text" name= "login" placeholder= "login" autocomplete= "off">
                        </div>
                        <div class= "form-group">
                            <input type= "password" name= "password" placeholder= "password" autocomplete= "off">
                        </div>
                        <div class="form-group">
                            <button type="submit" name= "submit" class="btn ">Valider</button>
                        </div> 
                </form>
            </section>
</body>
</html>