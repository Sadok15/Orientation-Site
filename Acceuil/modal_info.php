<?php

session_start();
require_once("../Inscription/Registration.php");
require_once("../Inscription/Info.php");

if(isset($_POST['submit'])){
extract($_POST);
$cin =  $_SESSION["cin"];
$mail =  $_SESSION["mail"];

    $_SESSION["math"] = $math;
    $_SESSION["physique"] = $physique;
    $_SESSION["algo"] = $algo;
    $_SESSION["tic"] = $tic;
    $_SESSION["base"] = $base;
    $_SESSION["arabe"] = $arabe;
    $_SESSION["francais"] = $francais;
    $_SESSION["anglais"] = $anglais;
    $_SESSION["philo"] = $philo;
    $_SESSION["sport"] = $sport;
    $_SESSION["option"] = $option;

$info = new info($mail,$cin,"I",$math,$physique,$algo,$tic,$base,$arabe,$francais,$anglais,$philo,$sport,$option);
$result = $info->save_candidate();
if ($result == "UNMODIFIED"){
    echo "<div class='alert alert-danger' role='alert'>Please check your informations</div>" ;
}else if ($result == "ERROR"){
    echo "<div class='alert alert-danger' role='alert'>We Cannot insert your informations</div>" ;
}else if($result == "ADDED"){
    $change = $info->change_etat();
    if ($change =="MODIFIED"){
        $_SESSION["etat"] = 1;
        echo "<div class='alert alert-success' role='alert'>Informations Added,<button type='submit' class='btn btn-info' onclick='window.close()'>Go to welcome page</button></div>" ;
    }else{
        echo  "<div class='alert alert-danger' role='alert'>Failed To Update Status</div>" ;
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
                        <form class="form-signin" method="POST" action="modal_info.php">
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
                                        <input type="text" id="inputAlgo" class="form-control" placeholder="algo" name="algo" required>
                                        <label for="inputAlgo">Algo</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputTic" class="form-control" placeholder="tic" name="tic"required>
                                        <label for="inputTic">Tic</label>
                                    </div>
                                </div>
                            </div>
                            <!-- --------------------------------------   !-->
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-label-group">
                                        <input type="text" id="inputBD" class="form-control" placeholder="base" name="base" required>
                                        <label for="inputBD">Base</label>
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
                                <div class="col-6"></div>
                            </div>

                            <hr class="my-4">
                            <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>