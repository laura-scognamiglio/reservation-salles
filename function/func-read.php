<?php
require_once("func-register.php");

class Read extends Log{
    function read_user(){

        $con =      $this->con();
        $getLg =    $this->setLogin(@$login);
        $getPw =    $this->setPassword(@$password);

        if(isset($_POST['submit'])){
            $read = ("SELECT * FROM `utilisateurs` WHERE `login`= '$getLg'");

            $read_user = $con->prepare($read);
            $read_user->execute();
            $users = $read_user->fetchAll();

            foreach ($users as $user){
                        echo "<pre>";
                        echo $user["login"] . " " . $user["password"] ;
                        echo "</pre>";
                    }
            return $users;
        }
    }
}