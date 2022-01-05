<?php
require_once('classe-user.php');

class Log extends User{
    public function register($login, $password){
        
       
        $con = $this->con();
        // echo "<pre>";
        // var_dump($con);
        // echo "</pre>";
        
        $getLg = $this->setLogin($login);
        $getPw = $this->setPassword($password);


        if(isset($_POST['submit'])){

            
            
            $sql = "INSERT INTO `utilisateurs` (`login`, `password`) VALUES (:login , :password)";

            $insert = $con->prepare($sql);
            $insert->execute(array(
                ":login" => $getLg, 
                ":password" => $getPw));
            
            echo "user successfully inserted <br>";
        
        }
    }
}
