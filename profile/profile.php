<?php
session_start();
require_once("../Inscription/info.php");
require_once("../Inscription/science.php");
if (isset($_POST['submit'])) {
    extract($_POST);
    if ($_SESSION["section"] == "I"){
        $_SESSION["math"] = $math;
        $_SESSION["physique"] = $physique;
        $_SESSION["algorithmique"] = $algo;
        $_SESSION["tic"] = $tic;
        $_SESSION["base"] = $base;
        $_SESSION["arabe"] = $arabe;
        $_SESSION["francais"] = $francais;
        $_SESSION["anglais"] = $anglais;
        $_SESSION["philo"] = $philo;
        $_SESSION["sport"] = $sport;
        $_SESSION["option"] =$option;

        $info = new info('',$_SESSION["cin"],"",$math,$physique,$algo,$tic,$base,$arabe,$francais,$anglais,$philo,$sport,$option);
        $result = $info->updateCandidate();
        if ($result == 1){
            $_SESSION["score"] = $info->calcul_score();
            $_SESSION["moyenne"] =$info->calcul_moy();
            echo "<div class='alert alert-success' role='alert'>Informations est mise a jour</div>" ;
        }else{
            echo "<div class='alert alert-danger' role='alert'>Probléme lors de la modification</div>" ;
        }

    }
    if ($_SESSION["section"] == "S"){
        $_SESSION["math"] = $math;
        $_SESSION["physique"] = $physique;
        $_SESSION["informatique"] = $info;
        $_SESSION["science"] = $science;
        $_SESSION["arabe"] = $arabe;
        $_SESSION["francais"] = $francais;
        $_SESSION["anglais"] = $anglais;
        $_SESSION["philo"] = $philo;
        $_SESSION["sport"] = $sport;
        $_SESSION["option"] =$option;
        $sc = new science('', $_SESSION["cin"], "I", $math, $physique, $science, $arabe, $francais, $anglais, $philo, $sport, $info, $option);
        $result = $sc->updateCandidate();
        if ($result == 1){
            $_SESSION["score"] = $info->calcul_score();
            $_SESSION["moyenne"] =$info->calcul_moy();
            echo "<div class='alert alert-success' role='alert'>Informations est mise a jour</div>" ;
        }else{
            echo "<div class='alert alert-danger' role='alert'>Probléme lors de la modification</div>" ;
        }

    }
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="../style/profile.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<body style="overflow: hidden;">
<header role="banner" style="background-image:url(../main_project/images/img_bg_1.jpg);" data-stellar-background-ratio="0.5">
<div class="container emp-profile">
    <form method="post" action="profile.php">
        <div class="row">
            <div class="col-md-4">
            <a href="../main_project/index.php" style=" background-color: #0062cc;color: white;border-radius: 50%;text-decoration: none;    display: inline-block;    padding: 8px 16px;">&#8249;</a>
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        <?php echo $_SESSION["nom"] . "  " . $_SESSION["prenom"] ?>
                    </h5>
                    <div class="row">
                        <div class="col-md-2">
                            <h6>
                                Cin :
                            </h6>
                        </div>
                        <div class="col-md-6">
                                <p><?php echo $_SESSION["cin"] ?></p>
                            </div>
                    </div>
                    <p class="proile-rating">Section : <span><?php if ($_SESSION["section"] == "I") echo "Informatique";
                                                                else echo "Science" ?></span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Main Details</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" class="profile-edit-btn" name="submit" value="Edit Profile" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-5" style="margin-left: -1rem;">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputmail" class="sr-only">mail</label>
                                <p><?php echo $_SESSION["mail"] ?></p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Your Score :</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $_SESSION["score"] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Your Average :</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $_SESSION["moyenne"] ?></p>
                            </div>
                        </div>
                        <hr>
                        <p>Your Notes :</p>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Math :</label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputMath" class="sr-only">Math</label>
                                    <input type="text" class="form-control" id="inputMath" name="math" style="margin: 0rem -1rem 0rem;" value="<?php echo $_SESSION["math"] ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Physique :</label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputphysique" class="sr-only">Physique</label>
                                    <input type="text" class="form-control" name="physique" id="inputphysique" style="margin: 0rem -1rem 0rem;" value="<?php echo $_SESSION["physique"] ?>">
                                </div>
                            </div>
                        </div>
                        <?php 
                            if ($_SESSION["section"] == "I"){
                                echo '<div class="row">
                                <div class="col-md-3">
                                    <label>Algorithme :</label>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="inputalgorithmique" class="sr-only">Algorithme</label>
                                        <input type="text" class="form-control" name="algo" id="inputalgorithmique" style="margin: 0rem -1rem 0rem;" value="'.$_SESSION["algorithmique"].'">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Tic :</label>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="inputtic" class="sr-only">Tic</label>
                                        <input type="text" class="form-control" id="inputtic" name="tic" style="margin: 0rem -1rem 0rem;" value="'.$_SESSION["tic"].'">
                                    </div>
                                </div>
                            </div>';
                            }
                            ?>
                        <div class="row">
                        <?php 
                            if ($_SESSION["section"] == "I")
                            echo '<div class="col-md-3">
                            <label>Base de Donnée :</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputbase" class="sr-only">Base</label>
                                <input type="text" class="form-control" id="inputbase" name="base" style="margin: 0rem -1rem 0rem;" value="'.$_SESSION["base"].'">
                            </div>
                        </div>';
                        else if($_SESSION["section"] == "S"){
                            echo '<div class="col-md-3">
                            <label>Science :</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputbase" class="sr-only">science</label>
                                <input type="text" class="form-control" id="inputbase" name="science" style="margin: 0rem -1rem 0rem;" value="'.$_SESSION["science"].'">
                            </div>
                        </div>';
                        }
                         ?>
                            <div class="col-md-3">
                                <label>Arabe :</label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputarabe" class="sr-only">Arabe</label>
                                    <input type="text" class="form-control" id="inputarabe" name="arabe" style="margin: 0rem -1rem 0rem;" value="<?php echo $_SESSION["arabe"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Francais :</label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputfrancais" class="sr-only">Francais</label>
                                    <input type="text" class="form-control" id="inputfrancais" name="francais" style="margin: 0rem -1rem 0rem;" value="<?php echo $_SESSION["francais"] ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Anglais :</label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputanglais" class="sr-only">Anglais</label>
                                    <input type="text" class="form-control" id="inputanglais" name="anglais" style="margin: 0rem -1rem 0rem;" value="<?php echo $_SESSION["anglais"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Philo :</label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputphilo" class="sr-only">Philo</label>
                                    <input type="text" class="form-control" id="inputphilo" name="philo" style="margin: 0rem -1rem 0rem;" value="<?php echo $_SESSION["philo"] ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Sport :</label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputsport" class="sr-only">Sport</label>
                                    <input type="text" class="form-control" id="inputsport" name="sport" style="margin: 0rem -1rem 0rem;" value="<?php echo $_SESSION["sport"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Option :</label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputoption" class="sr-only">Option</label>
                                    <input type="text" class="form-control" id="inputoption" name="option" style="margin: 0rem -1rem 0rem;" value="<?php echo $_SESSION["option"] ?>">
                                </div>
                            </div>
                            <?php
                                if($_SESSION["section"] == "S"){
                                    echo '
                                    <div class="col-md-3">
                                        <label>Informatique :</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <label for="inputalgorithmique" class="sr-only">Informatique</label>
                                            <input type="text" class="form-control" id="inputalgorithmique" name="info" style="margin: 0rem -1rem 0rem;" value="'.$_SESSION["informatique"].'">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                    </div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</header>
</body>
