<?php
class Con{
  public function con(){
    
    $dns = 'mysql:host=localhost;dbname=reservationsalles';

            try{
                $pdo = new PDO($dns, 'root', 'root', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
                echo "connexion opérationnelle ! <br>";
    
            } catch(PDOException $e){
                echo "error : " . $e->getMessage();
            }
            
            return($pdo);
    
        }  
}



?>