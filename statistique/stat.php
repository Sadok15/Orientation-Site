<?php

include_once("../config.php");

class Stat extends connexion{

    public function nbrCandidate(){
        
        $query = $this->pdo->prepare("SELECT COUNT(*) as nb FROM registration ");
        $query->execute();
        $nb_candidate = $query->fetch(\PDO::FETCH_ASSOC);
        return $nb_candidate ;

    }

    public function nbrCandidateInfo(){
        
        $query = $this->pdo->prepare("SELECT COUNT(*) as nb FROM registration WHERE section = 'I' ");
        $query->execute();
        $nb_candidateInfo = $query->fetch(\PDO::FETCH_ASSOC);
        return $nb_candidateInfo ;

    }

    public function nbrCandidateScience(){

        
        $query = $this->pdo->prepare("SELECT COUNT(*) as nb FROM registration WHERE section = 'S' ");
        $query->execute();
        $nb_candidateSc = $query->fetch(\PDO::FETCH_ASSOC);
        return $nb_candidateSc ;

    }

    public function nbrFac(){ 

        $query = $this->pdo->prepare("SELECT COUNT(*) as nb FROM fac ");
        $query->execute();
        $nb_fac = $query->fetch(\PDO::FETCH_ASSOC);
        return $nb_fac ;

    }

}

?>