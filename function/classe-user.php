<?php
    require_once('database.php');
    require_once('model.php');
  
class User extends Model{
    private $login;
    private $password;

   

    public function __construct($login, $password){
        parent::__construct();
        $this->login = $login;
        $this->password = $password; 
    }

    public function getLogin(){
        return $this->login;
    }
    public function getPassword(){
        return $this->password;
    }

    public function setLogin($login){
        @$login = htmlspecialchars($_POST['login']);
        return $login;
    }

    public function setPassword($password){
        @$password = htmlspecialchars($_POST['password']);
        return $password;
    }

   
   
  
}

