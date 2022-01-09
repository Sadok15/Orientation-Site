<?php
require_once("Registration.php");
require_once("../config.php");
class science extends Registration{

    public $math;
    public $physique;
    public $science;
    public $arabe;
    public $francais;
    public $anglais;
    public $philo;
    public $sport;
    public $informatique;
    public $option;



public function __construct(
    $email,
    $cin ,
    $section,
    $math,
    $physique,
    $science,
    $arabe,
    $francais,
    $anglais,
    $philo,
    $sport,
    $informatique,
    $option
){

parent:: __construct('','',$email,$cin ,$section) ;
$this->math = $math ;
$this->physique = $physique ;
$this->science = $science ;
$this->arabe = $arabe ;
$this->francais = $francais ;
$this->anglais = $anglais ;
$this->philo = $philo ;
$this->sport = $sport ;
$this->informatique = $informatique ;
$this->option = $option ;

}

public function calcul_moy(){
    $MG = (
              4* $this->math 
            + 3* $this->physique
            + 4* $this->science
            + 1* $this->arabe
            + 1* $this->francais
            + 1* $this->anglais 
            + 1* $this->philo
            + 1* $this->informatique 
            + 1* $this->sport
            ) / 15 ; 
    
            return $MG ;
}

public function calcul_score(){
    $MG = $this->calcul_moy() ;
    $FG =
        4 * $MG 
        + 1 * $this->math 
        + 1.5 * $this->physique 
        + 1.5 * $this->science 
        + $this->francais 
        + $this->anglais ;
    
        return $FG ;

}

function save_candidate(){

    $moy = $this-> calcul_moy();
    $score = $this-> calcul_score();
    $query1 = "UPDATE registration SET moyenne =$moy , score =$score WHERE cin = '$this->cin' " ;
    echo $query1;
    $res1 = $this->pdo->prepare($query1);
    $res1->execute();
    if($res1->rowCount() > 0){
    $query2 = " INSERT INTO science SET cin = '$this->cin' , section = 'S',
                math = $this->math, physique = $this->physique, science = $this->science ,
                arabe = $this->arabe , francais = $this->francais  , anglais = $this->anglais,
                philo = $this->philo , sport = $this->sport, `option` = $this->option ,informatique = $this->informatique";
    echo $query2;
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
    $query2 = " UPDATE  science SET  math = $this->math, physique = $this->physique, science = $this->science ,
                arabe = $this->arabe , francais = $this->francais  , anglais = $this->anglais,
                philo = $this->philo , sport = $this->sport, `option` = $this->option ,informatique = $this->informatique  WHERE cin = '$this->cin'";

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