
<?php
 include_once("../../config.php");
 
 class Fac_Admin extends connexion{

    public $matricule;
    public $nom_fac;
    public $specialite;
    public $type_licence;
    public $section;
    public $score_limite;
    public $nb_places;

    public function __construct($matricule,$nom_fac,$specialite,$type_licence,$section,$score_limite,$nb_places){
        
        parent:: __construct();
        $this->matricule = $matricule ;
        $this->nom_fac = $nom_fac;
        $this->specialite = $specialite;
        $this->type_licence = $type_licence;
        $this->section = $section;
        $this->score_limite = $score_limite;
        $this->nb_places = $nb_places;

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


    public function insert_fac(){

        $data = $this->pdo->prepare("INSERT INTO fac SET  matricule='$this->matricule',
                                     nom_fac='$this->nom_fac' , specialite='$this->specialite' , type_licence='$this->type_licence' ");
        $data->execute();

        if($this->section == 'I'){
            $info = $this->pdo->prepare("INSERT INTO fac_info SET  matricule='$this->matricule',
                                     score_limit='$this->score_limite' , nb_place='$this->nb_places' ");
            $info->execute();

        }else if($this->section == 'S'){

            $sc = $this->pdo->prepare("INSERT INTO fac_science SET  matricule='$this->matricule',
                    score_limit='$this->score_limite' , nb_place='$this->nb_places' ");
            $sc->execute();
        }
        if($data->rowCount() == 1){
            return "ADDED";
        }else{
            return "ERROR";
        }
    }

    

 }

?>