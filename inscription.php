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
    // require_once("./function/bdd-connect.php");
    // require_once("./function/classe-user.php");
    // require_once("./function/func-register.php");
    require_once("./function/func-read.php");
    // $database = new Con();
    // $database->con();
    $user = new User(@$login, @$password);
    $user = new Log(@$login, @$password);
    $user = new Read(@$login, @$password);
    $user->register(@$login, @$password);
    $user->read_user();

    
    ?>
    <section class= "formulaireIns">
                <h2 class= "sous-titre" >Inscription</h2>
                <form class= "formIns"  method= "post">
                
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
</body>
</html>
