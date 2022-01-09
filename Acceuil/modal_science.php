<?php

session_start();
require_once("../Inscription/Registration.php");
require_once("../Inscription/science.php");

if (isset($_POST['submit'])) {
    extract($_POST);
    $cin =  $_SESSION["cin"];
    $mail =  $_SESSION["mail"];

    $_SESSION["math"] = $math;
    $_SESSION["physique"] = $physique;
    $_SESSION["science"] = $science;
    $_SESSION["arabe"] = $arabe;
    $_SESSION["francais"] = $francais;
    $_SESSION["anglais"] = $anglais;
    $_SESSION["philo"] = $philo;
    $_SESSION["sport"] = $sport;
    $_SESSION["option"] = $option;
    $_SESSION["info"] = $info;

    $sc = new science($mail, $cin, "I", $math, $physique, $science, $arabe, $francais, $anglais, $philo, $sport, $info, $option);
    $result = $sc->save_candidate();
    if ($result == "UNMODIFIED") {
        echo "<div class='alert alert-danger' role='alert'>Vérifié vos informations</div>";
    } else if ($result == "ERROR") {
        echo "<div class='alert alert-danger' role='alert'>Un probléme se produit lors de l'ajout</div>";
    } else if ($result == "ADDED") {
        $change = $sc->change_etat();
        if ($change == "MODIFIED") {
            $_SESSION["etat"] = 1 ;
            echo "<div class='alert alert-success' role='alert'>Informations Ajouter, <button type='submit' class='btn btn-info' onclick='window.close()'>Go to welcome page</button></div>";
        } else {
            echo  "<div class='alert alert-danger' role='alert'>Un erreur se produit lors de la modification d'etat</div>";
        }
    }
}
?>

<html>

<head>
    <title>Notes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/register.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Notes</h5>
                        <form name="f" onsubmit="return verif()" class="form-signin" method="POST" action="modal_science.php">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputMath" class="form-control" placeholder="math" name="math" required>
                                        <label for="inputMath">Math</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputPhy" class="form-control" placeholder="physique" name="physique" required>
                                        <label for="inputPhy">Physique</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputBD" class="form-control" placeholder="science" name="science" required>
                                        <label for="inputBD">science</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputArab" class="form-control" placeholder="arabe" name="arabe" required>
                                        <label for="inputArab">Arabe</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputFr" class="form-control" placeholder="francais" name="francais" required>
                                        <label for="inputFr">Francais</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputAng" class="form-control" placeholder="anglais" name="anglais" required>
                                        <label for="inputAng">Anglais</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputPhilo" class="form-control" placeholder="philo" name="philo" required>
                                        <label for="inputPhilo">Philo</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputSp" class="form-control" placeholder="sport" name="sport" required>
                                        <label for="inputSp">Sport</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputOp" class="form-control" placeholder="option" name="option" required>
                                        <label for="inputOp">Option</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputInfo" class="form-control" placeholder="info" name="info" required>
                                        <label for="inputInfo">info</label>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="save" onclick="verif()">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
function verif(){
    if(isNaN(f.math.value) || (Number(f.math.value)<0 || Number(f.math.value)>20)){

        alert(" Notes math entre 0 et 20 ");
        return false;
    }
    else if(isNaN(f.physique.value) || (Number(f.physique.value)<0 || Number(f.physique.value)>20)){
    
        alert(" Notes Science entre 0 et 20 ");
        return false;
    }
    else if(isNaN(f.science.value) || (Number(f.science.value)<0 || Number(f.phscienceysique.value)>20)){
        
        alert(" Notes physique entre 0 et 20 ");
        return false;
    }
    else if(isNaN(f.arabe.value)  || (Number(f.arabe.value)<0 || Number(f.arabe.value)>20)){
    
        alert(" Notes arabe entre 0 et 20 ");
        return false;
    }
    else if(isNaN(f.francais.value)  || (Number(f.francais.value)<0 || Number(f.francais.value)>20)){
    
        alert(" Notes francais entre 0 et 20 ");
        return false;
    }
    else if(isNaN(f.anglais.value)  || (Number(f.anglais.value)<0 || Number(f.anglais.value)>20)){
    
        alert(" Notes anglais entre 0 et 20 ");
        return false;
    }
    else if(isNaN(f.philo.value)  || (Number(f.philo.value)<0 || Number(f.philo.value)>20)){
    
        alert(" Notes philo entre 0 et 20 ");
        return false;
    }
    else if(isNaN(f.sport.value)  || (Number(f.sport.value)<0 || Number(f.sport.value)>20)){
    
        alert(" Notes sport entre 0 et 20 ");
        return false;
    }
    else if(isNaN(f.info.value)  || (Number(f.info.value)<0 || Number(f.info.value)>20)){
    
        alert(" Notes info entre 0 et 20 ");
        return false;
    }
    else if(isNaN(f.option.value)  || (Number(f.option.value)<0 || Number(f.option.value)>20)){
    
        alert(" Notes option entre 0 et 20 ");
        return false;
    }

}

</script>

</body>

</html>