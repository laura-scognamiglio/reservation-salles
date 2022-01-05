<?php
    include('bdd-connect.php');
  
class User extends Con{
    private $login;
    private $password;


    public function __construct($login, $password){
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

