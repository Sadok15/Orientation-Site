<?php
session_start();
require_once("./Registration.php");

if(isset($_POST['submit'])){
$mail = $_POST["mail"];
$cin  = $_POST["cin"];
$r = new Registration('','',$mail,$cin,'');
$log = $r->getCondidate();
if (!empty($log) ){
$_SESSION["mail"] = $mail ;
$_SESSION["nom"] = $log["nom"];
$_SESSION["prenom"] = $log["prenom"];
$_SESSION["etat"] = $log["etat"];
$_SESSION["section"] = $log["section"];
$_SESSION["cin"] = $cin;
$_SESSION["moyenne"] = $log["moyenne"];
$_SESSION["score"] = $log["score"];


// -------------------------   Notes
if ($_SESSION["section"] == "I"){
$note = $r->getCandidateInfoNotes();
$_SESSION["math"] = $note["math"];
$_SESSION["physique"] = $note["physique"];
$_SESSION["algorithmique"] = $note["algorithmique"];
$_SESSION["tic"] = $note["tic"];
$_SESSION["base"] = $note["base"];
$_SESSION["arabe"] = $note["arabe"];
$_SESSION["francais"] = $note["francais"];
$_SESSION["anglais"] = $note["anglais"];
$_SESSION["philo"] = $note["philo"];
$_SESSION["sport"] = $note["sport"];
$_SESSION["option"] = $note["option"];
}else{
  $note = $r->getCandidateScienceNotes();
  $_SESSION["math"] = $note["math"];
  $_SESSION["physique"] = $note["physique"];
  $_SESSION["informatique"] = $note["informatique"];
  $_SESSION["science"] = $note["science"];
  $_SESSION["arabe"] = $note["arabe"];
  $_SESSION["francais"] = $note["francais"];
  $_SESSION["anglais"] = $note["anglais"];
  $_SESSION["philo"] = $note["philo"];
  $_SESSION["sport"] = $note["sport"];
  $_SESSION["option"] = $note["option"];
}
$_SESSION["msg"] =  "Welcome" ;
header("location:../main_project/index.php");
}else{
  echo "<div class='alert alert-danger' role='alert'>Identification Invalid</div>" ;
}
}
?>

<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../style/register.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Se Connecter</h5>
            <form class="form-signin" method="POST" action="login.php">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Addresse Mail" name="mail">
                <label for="inputEmail">Addresse Mail</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="cin">
                <label for="inputPassword">Mot de passe</label>
              </div>
              <br>
              <br>
              <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="Se Connecter">
              <hr class="my-4">
              <a href="./register.php" class="btn btn-lg btn-primary btn-block text-uppercase" >S'inscrire</a>
              <br>
              <div class="form-check col-6">
                <a href="./forget.php" style="margin: 1rem -1rem 1rem;">
                  Mot de passe oublié ?
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>