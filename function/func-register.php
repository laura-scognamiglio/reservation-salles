<?php
require_once('classe-user.php');
// require_once('database.php');
require_once('model.php');
 
// regex pour mot de passes  preg-match pour la sécu!  
class Register extends User{

    protected $table = "utilisateurs";

    public function registerIn($login, $password){
        $getLg = $this->setLogin($login);
        $getPw = $this->setPassword($password);
      
        @$submit = $_POST['submit'];
        @$confirm = $_POST['confirm'];

        if(isset($submit))
        {
            $error = array();
            $read = ("SELECT * FROM {$this->table} WHERE `login` = '$getLg'");

            $read_user = $this->pdo->prepare($read);
            $read_user->execute();
            $users = $read_user->fetchAll();
          
            if(empty($getLg))
            {
                echo $error['login'] = "Login is empty <br>";
            }

            elseif(count($users) != 0)
            {
                echo $error['login_used'] = "Login is alredy used <br>";
            }

            elseif(empty($getPw))
            {
                echo $error['password'] = "Password is empty <br>";
            }
            else
            {
                switch($getPw)
                {
                    case($getPw != $confirm):
                        echo $error['confirm'] = "Passwords doesn't match <br>";
                        break;
                    
                    case(empty($error)):
                        $pw_hash = password_hash($getPw, PASSWORD_BCRYPT);
                        $sql = "INSERT INTO {$this->table} (`login`, `password`) VALUES (:login , :password)";

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

      
        // $_SESSION['password'] = $users['password'];
        if(isset($submit))
        {
            $read = "SELECT * FROM {$this->table} WHERE `login` = '$getLg'";
            $read_user = $this->pdo->prepare($read);
            $read_user->execute();
            $users = $read_user->fetchAll();

            if(count($users) != 0)
            {
                $_SESSION['user'] = $users[0]['login'];
                $pwd_user_connected = $users[0]["password"];
                password_verify($getPw, $pwd_user_connected);

                header('Location:index.php');
                echo "the user is connected";
                var_dump($_SESSION);

            }
            elseif($getLg != $users[0]['login'])
            {
                echo "the id is wrong ";
            }
           return $users;
        }
             
    }
    public function updateUser($newlogin, $newpassword,$oldlogin)
    {

        $getLg = $this->setLogin($login);
        $getPw = $this->setPassword($password);
        echo "getLg";
        var_dump($newlogin);

        $read = "SELECT * FROM `utilisateurs` WHERE `login` = '$getLg'";
        $read_user = $this->pdo->prepare($read);
        $read_user->execute();
        $users = $read_user->fetchAll();


        $getLg = $_SESSION['user'];


        if(isset($_POST['update'])){
        
        $newlogin = $_POST['newlogin'];
        $newpassword = $_POST['newpassword'];
        $_SESSION['user'] = $newlogin;
            
            $up = ("UPDATE {$this->table} SET `login`= :newlogin, `password`= :newpassword WHERE `login`= '{$oldlogin}'");

            $update = $this->pdo->prepare($up);
            $update->execute(array(
                ":newlogin" => $newlogin,
                ":newpassword" => $newpassword
            ));

            
        }
        
    }
        
    
}
