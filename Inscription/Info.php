<?php
include_once("Registration.php");
include_once("../config.php");
class info extends Registration{

    public $math;
    public $physique;
    public $algorithmique;
    public $tic;
    public $base;
    public $arabe;
    public $francais;
    public $anglais;
    public $philo;
    public $sport;
    public $option;



public function __construct(
    $email,
    $cin ,
    $section,
    $math,
    $physique,
    $algorithmique,
    $tic,
    $base,
    $arabe,
    $francais,
    $anglais,
    $philo,
    $sport,
    $option
){

parent:: __construct('','',$email,$cin ,$section) ;
$this->math = $math ;
$this->physique = $physique ;
$this->algorithmique = $algorithmique ;
$this->tic = $tic ;
$this->base = $base ;
$this->arabe = $arabe ;
$this->francais = $francais ;
$this->anglais = $anglais ;
$this->philo = $philo ;
$this->sport = $sport ;
$this->option = $option ;

}

public function calcul_moy(){
    $MG = (
              3* $this->math 
            + 2* $this->physique
            + 3* $this->algorithmique
            + 1.5* $this->tic
            + 1.5* $this->base
            + 1* $this->arabe
            + 1* $this->francais
            + 1* $this->anglais 
            + 1* $this->sport
            ) / 15 ; 
    
            return $MG ;
}

public function calcul_score(){
    $MG = $this->calcul_moy() ;
    $FG =
        4 * $MG 
        + 1.5 * $this->math 
        + 1.5 * $this->algorithmique 
        + 0.5 * $this->sport 
        + 0.25 * ($this->tic+$this->base) 
        + $this->francais 
        + $this->anglais ;
    
        return $FG ;

}

function save_candidate(){
    
        $moy = $this-> calcul_moy();
        $score = $this-> calcul_score();
        $query1 = "UPDATE registration SET moyenne =$moy , score =$score WHERE cin = '$this->cin' " ;
        $res1 = $this->pdo->prepare($query1);
        $res1->execute();
        if($res1->rowCount() > 0){
            $query2 = " INSERT INTO info SET cin = '$this->cin' , section = '$this->section',
                        math = $this->math, physique = $this->physique,
                        algorithmique = $this->algorithmique, tic = $this->tic, base=$this->base,
                        arabe = $this->arabe , francais = $this->francais  , anglais = $this->anglais,
                        philo = $this->philo , sport = $this->sport, `option` = $this->option ";
            $res2 = $this->pdo->prepare($query2);
            $res2->execute();
            if ($res2->rowCount() > 0 ){
                return "ADDED" ;
            }else{
                return "ERROR" ;
            }
        }else{
            return "UNMODIFIED";
        }
}

function updateCandidate(){
    $moy = $this-> calcul_moy();
    $score = $this-> calcul_score();
    $query1 = "UPDATE registration SET moyenne =$moy , score =$score WHERE cin = '$this->cin' " ;
    $res1 = $this->pdo->prepare($query1);
    $res1->execute();
    if($res1->rowCount() > 0){
        $query2 = " UPDATE info SET  math = $this->math, physique = $this->physique,  algorithmique = $this->algorithmique,
                    tic = $this->tic, base=$this->base, arabe = $this->arabe , francais = $this->francais  , anglais = $this->anglais,
                    philo = $this->philo , sport = $this->sport, `option` = $this->option WHERE cin = '$this->cin' ";
        $res2 = $this->pdo->prepare($query2);
        $res2->execute();
        return $res2->rowCount();
    }else{
        return "ERROR";
    }
}

function change_etat(){
    $query1 = "UPDATE registration SET etat = '1' WHERE cin = '$this->cin' " ;
    $res1 = $this->pdo->prepare($query1);
    $res1->execute();
    if($res1->rowCount() > 0){
        return "MODIFIED" ;
    }else{
        return "ERROR" ;
    }
}

}

?>