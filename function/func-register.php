<?php
require_once('classe-user.php');

class Log extends User{
    public function register($login, $password){
        $con = $this->con();
        $getLg = $this->setLogin($login);
        $getPw = $this->setPassword($password);

        @$submit = $_POST['submit'];
        @$confirm = $_POST['confirm'];

        if(isset($submit)){

            $error = array();

            $read = ("SELECT * FROM `utilisateurs` WHERE `login` = '$getLg'");

            $read_user = $con->prepare($read);
            $read_user->execute();
            $users = $read_user->fetchAll();
          
            if(empty($getLg)){
                echo $error['login'] = "Login is empty <br>";
            }

            elseif(count($users) != 0){
                echo $error['login_used'] = "Login is alredy used <br>";
            }

            elseif(empty($getPw)){
                echo $error['password'] = "Password is empty <br>";
            }

            else{
                switch($getPw)
                {
                    case($getPw != $confirm):
                        echo $error['confirm'] = "Passwords doesn't match <br>";
                        break;
                    
                    case(empty($error)):
                        $pw_hash = password_hash($getPw, PASSWORD_BCRYPT);
                        $sql = "INSERT INTO `utilisateurs` (`login`, `password`) VALUES (:login , :password)";

                        $insert = $con->prepare($sql);
                        $insert->execute(array(
                            ":login" => $getLg, 
                            ":password" => $pw_hash ));
                        
                        echo "user successfully inserted <br>";
                        break;

                    default:
                        echo "An error occurred. Please try again <br>";
                        break;
                }
            }
        }      
        
    }

}
