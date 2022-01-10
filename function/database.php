<?php
/**
 * fonction servant à la connexion à ma base de données, retourne la connexion
 */

function getpdo(){
    $dns = 'mysql:host=localhost;dbname=reservationsalles';

            try{
                $pdo = new PDO($dns, 'root', 'root', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
                echo "connexion PDO opérationnelle ! <br>";
    
            } catch(PDOException $e){
                echo "error : " . $e->getMessage();
            }
            
            return($pdo);
    
}


?>