<?php
include_once("../config.php");
class Registration extends connexion{

     public $nom ;
     public $prenom ;
     public $email ;
     public $cin ;
     public $section ;

    public function __construct($nom, $prenom, $email, $cin, $section){

        parent:: __construct();
        $this->nom = $nom ;
        $this->prenom = $prenom ;
        $this->email = $email ;
        $this->cin = $cin ;
        $this->section = $section ;
    }

    public function getCondidate(){

        $res = $this->pdo->prepare("SELECT * FROM registration WHERE mail = '$this->email' and cin = '$this->cin' ");
        $res->execute();
        $data = $res->fetch(\PDO::FETCH_ASSOC);
        return $data ;
    }

    public function checkCondidate(){

        $res = $this->pdo->prepare("SELECT nom FROM registration WHERE (mail = '$this->email') OR (mail = '$this->email' and cin = '$this->cin') ");
        $res->execute();
        $data = $res->fetch(\PDO::FETCH_ASSOC);
        return $data ;
    }

    public function saveCondidate(){
      $data = array("ERROR");
      if(strlen($this->checkCondidate()['nom']) == 0){
        $pre = $this->pdo->prepare("INSERT INTO registration(cin,mail,section,nom,prenom,etat)  VALUES ('$this->cin','$this->email','$this->section','$this->nom','$this->prenom','0')");
        $pre->execute();
        $data1 = array($this->nom,$this->nom);
        return $data1;
        }else{
            return $data;
        }
    }

    public function forgetPassword(){
        $error = array("ERROR");

        $res = $this->pdo->prepare("SELECT mail FROM registration WHERE mail = '$this->email' ");
        $res->execute();
        $data = $res->fetch(\PDO::FETCH_ASSOC);
        if ($data['mail'] != ''){
            $query = "UPDATE registration SET cin = '$this->cin' WHERE mail = '$this->email'" ;
            $pre = $this->pdo->prepare($query);
            $pre->execute();
            $succes = array("update");
            if($pre) 
                return $succes ;
            else 
                return $error ;
        }else
             return $error ;
    }

    public function getCandidateInfoNotes(){
        $query = "SELECT i.* FROM registration r LEFT JOIN info i ON r.cin = i.cin  WHERE r.mail = '$this->email' AND r.cin = '$this->cin'  ";
        echo $query ;
        $res = $this->pdo->prepare($query);
        $res->execute();
        $data = $res->fetch(\PDO::FETCH_ASSOC);
        if ($data){
            return $data ;
        }else{
            return [] ;
        }
    }

    public function getCandidateScienceNotes(){
        $query = "SELECT s.* FROM registration r LEFT JOIN science s ON r.cin = s.cin  WHERE r.mail = '$this->email' AND r.cin = '$this->cin'  ";
        echo $query ;
        $res = $this->pdo->prepare($query);
        $res->execute();
        $data = $res->fetch(\PDO::FETCH_ASSOC);
        if ($data){
            return $data ;
        }else{
            return [] ;
        }
    }

    public function list_info(){

        $data = $this->pdo->prepare("SELECT f.* , fi.score_limit, fi.nb_place FROM fac f LEFT JOIN fac_info fi ON f.matricule = fi.matricule");
        $data->execute();
        $result= $data->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

}
?>