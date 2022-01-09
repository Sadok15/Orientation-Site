<?php
 include_once("../config.php");
 
 class Fac extends connexion{

    public $matricule;
    public $nom_fac;
    public $specialite;
    public $type_licence;
    public $cin;

    public function __construct($matricule,$nom_fac,$specialite,$type_licence,$cin){
        
        parent:: __construct();
        $this->matricule = $matricule ;
        $this->nom_fac = $nom_fac;
        $this->specialite = $specialite;
        $this->type_licence = $type_licence;
        $this->cin = $cin;

    }

    public function list_info(){

        $data = $this->pdo->prepare("SELECT f.* , fi.score_limit, fi.nb_place FROM fac f LEFT JOIN fac_info fi ON f.matricule = fi.matricule");
        $data->execute();
        return $data;
    }

    public function list_science(){


        $data = $this->pdo->prepare("SELECT f.*, fs.score_limit, fs.nb_place FROM fac f LEFT JOIN fac_science fs  ON f.matricule = fs.matricule");
        $data->execute();
        return $data ;
    }


    public function postuler(){

        $data = $this->pdo->prepare("INSERT INTO fiche_candidate SET cin='$this->cin' , matricule='$this->matricule'");
        $data->execute();
        if($data->rowCount() == 1){
            return "ADDED";
        }else{
            return "ERROR";
        }
    }
    

 }

?>