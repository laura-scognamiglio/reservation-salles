<?php
require_once('classe-user.php');
require_once('database.php');
require_once('model.php');
 

class Register extends User{

    public function registerIn($login, $password){
        $getLg = $this->setLogin($login);
        $getPw = $this->setPassword($password);
      


        @$submit = $_POST['submit'];
        @$confirm = $_POST['confirm'];

        if(isset($submit)){

            $error = array();
            $read = ("SELECT * FROM `utilisateurs` WHERE `login` = '$getLg'");

            $read_user = $this->pdo->prepare($read);
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

                        $insert = $this->pdo->prepare($sql);
                        $insert->execute(array(
                            ":login" => $getLg, 
                            ":password" => $pw_hash ));
                        
                        echo "user successfully inserted <br>";
                        break;

                    default:
                        echo "An error occurred. Please try again <br>";
                        break;
                    return $insert;
                }
            }
            return $users;
        }      
        
        
    }

    public function connect($login, $password)
    {
        
        $getLg = $this->setLogin($login);
        $getPw = $this->setPassword($password);
   
     
        @$submit = $_POST['submit'];
       
        if(isset($submit))
        {
            $read = ("SELECT * FROM `utilisateurs` WHERE `login` = '$getLg'");

            $read_user = $this->pdo->prepare($read);
            $read_user->execute();
            $users = $read_user->fetchAll();
            
var_dump($users);
            if(count($users) != 0)
            {
                $_SESSION['user'] = $user_connected; 
                $pwd_user_connected = $user_connected[0]["password"];
                password_verify($getPw, $pwd_user_connected);
                    // header('Location:index.php');
                    echo "the user is connected";
            }
            elseif($getLg != $user_connected['login'])
            {
                echo "the id is wrong ";
            }
        
           return $user_connected;
           
         }
         
    }

}
