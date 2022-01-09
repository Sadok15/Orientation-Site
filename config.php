<?php

class connexion{
    protected $pdo ;
    function __construct(){
        try{
        $this->pdo = new PDO('mysql:host=localhost;dbname=orientation','root','');
        }catch(PDOException $e){
            echo $e->getMessage();
            die;
        }
    }

    function __destruct()
    {
        $this->pdo=null;
    }
}

?>