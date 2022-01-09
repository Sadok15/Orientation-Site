<?php
session_start();
require_once("./Registration.php");

if(isset($_POST['submit'])){
$nom = $_POST["nom"];
$prenom  = $_POST["prenom"];
$section  = $_POST["section"];
$mail = $_POST["mail"];
$cin  = $_POST["cin"];

$r = new Registration($nom,$prenom,$mail,$cin,$section);
$save = $r->saveCondidate();
if($save[0] != "ERROR"){
  $_SESSION["nom"] = $save[0];
  $_SESSION["prenom"] = $save[1];
  $_SESSION["etat"] = '0';
  $_SESSION["mail"] = $mail;
  $_SESSION["cin"] = $cin;
  header("location:../main_project/index.php");
}else{
  if($save[0] == "ERROR")
    echo "<div class='alert alert-danger' role='alert'>Adresse mail deja existante</div>" ;
  else
    echo "<div class='alert alert-danger' role='alert'>ERROR</div>" ;
}

}
?>
<html>
<head>
  <title>register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/register.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">S'inscrire</h5>
            <form name="f" class="form-signin" method="POST" action="register.php" onsubmit="return verif()">
              <div class="form-label-group">
                <input type="text" id="inputNom" class="form-control" placeholder="Votre Nom" name="nom" required>
                <label for="inputNom">Votre Nom</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="inputPrenom" class="form-control" placeholder="Votre Prenom" name="prenom" required>
                <label for="inputPrenom">Votre Prenom</label>
              </div>
              <div class="row" style="margin: 2rem 1rem 1rem;">
                <div class="form-check col-6">
                  <input class="form-check-input" type="radio" name="section" id="flexRadioDefault1" value="I">
                  <label class="form-check-label" for="flexRadioDefault1" style="margin-left: 1rem;">
                    Info
                  </label>
                </div>
                <div class="form-check col-6">
                  <input class="form-check-input" type="radio" name="section" id="flexRadioDefault2" value="S">
                  <label class="form-check-label" for="flexRadioDefault2" style="margin-left: 1rem;">
                    Science
                  </label>
                </div>
              </div>
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Adresse Mail" name="mail" required>
                <label for="inputEmail">Adresse Mail</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe(cin)" name="cin" required>
                <label for="inputPassword">Mot de passe(cin)</label>
              </div>
              <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="Enregistrer" onclick="verif()">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
function verif(){
if ( (f.section[0].checked == false) && (f.section[1].checked == false)){
  alert("Choisir votre Section svp !");
  return false;
}
else if(f.cin.value.length != 8 || isNaN(f.cin.value)){
  alert("mot de passe est une chaine de taiile 8 composé par des chiffre (CIN)");
  return false;
}
}
</script>

</html>