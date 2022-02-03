<?php
    require_once('database.php');
    require_once('model.php');
  
class User extends Model{
    protected $login;
    protected $password;

   

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

    //valeur courante de ma classe 
    public function setLogin(){
        @$login = htmlspecialchars($_POST['login']);
        $this->login = $login;
        return $login;
    }

    public function setPassword(){
        @$password = htmlspecialchars($_POST['password']);
        $this->password = $password;
        return $password;
    }

    public function userConnected($isConnected){
        
    }

}

