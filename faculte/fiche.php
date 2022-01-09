<?php
 include_once("../config.php");
 
 class Fiche extends connexion{

    public $cin;
    public $matricule;
    public $ordre;
    public $section;

    public function __construct($cin,$matricule,$ordre,$section){
        
        parent:: __construct();
        $this->cin = $cin;
        $this->matricule = $matricule;
        $this->ordre = $ordre;
        $this->section = $section;

    }

    public function list_choix(){
        if($this->section == "I"){
            $query="SELECT fac.* , fi.score_limit,fi.nb_place , fc.ordre FROM fiche_candidate fc LEFT JOIN fac ON fc.matricule = fac.matricule LEFT JOIN fac_info fi ON fi.matricule=fac.matricule WHERE fc.cin='$this->cin' ORDER BY fc.ordre";
        }else{
            $query="SELECT fac.* , fs.score_limit,fs.nb_place, fc.ordre FROM fiche_candidate fc LEFT JOIN fac ON fc.matricule = fac.matricule LEFT JOIN fac_science fs ON fs.matricule=fac.matricule  WHERE fc.cin='$this->cin' ORDER BY fc.ordre";
        }
        $data = $this->pdo->prepare($query);
        $data->execute();
        return $data;
    }

    public function nbrChoix(){
        $query = $this->pdo->prepare("SELECT COUNT(*) as nb FROM fiche_candidate WHERE cin = '$this->cin' ");
        $query->execute();
        $nb_choix = $query->fetch(\PDO::FETCH_ASSOC);
        return $nb_choix ;

    }

    public function changeOrdre(){
        $query = "UPDATE fiche_candidate SET ordre = '$this->ordre' WHERE cin = '$this->cin' and matricule = '$this->matricule'" ;
        echo $query ;
        $pre = $this->pdo->prepare($query);
        $pre->execute();
        if($pre) 
            return "MODIFIED" ;
        else 
            return "ERROR" ;
    }


    

 }

?>