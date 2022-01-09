<?php
session_start();
require_once("./Registration.php");

if(isset($_POST['submit'])){
$mail = $_POST["mail"];
$cin  = $_POST["cin"];
$r = new Registration('','',$mail,$cin,'');
$log = $r->forgetPassword();
if ($log [0] != "ERROR"){
  header("location:../inscription/login.php");
  }
else{
    echo "<div class='alert alert-danger' role='alert'>Adresse Mail Invalide</div>" ;
}
}
?>

<html>
<head>
  <title>forget password</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../style/register.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Forget Password ??</h5>
            <form class="form-signin" method="POST" action="forget.php" onsubmit="return verif()" name="f">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="mail" required>
                <label for="inputEmail">Email address</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Your New Password" name="cin" required>
                <label for="inputPassword">Your New Password</label>
              </div>
              <br>
              <br>
              <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="Save" onclick="verif()">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
function verif(){
 if(f.cin.value.length != 8 || isNaN(f.cin.value)){
  alert("mot de passe est une chaine de taiile 8 composé par des chiffre (CIN)");
  return false;
}
}
</script>
</html>