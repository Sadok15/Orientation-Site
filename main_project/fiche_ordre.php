<?php
session_start();
require_once("../faculte/fiche.php");
if(empty($_POST['mat'])){
	$mat = '';
}else{
	$mat = $_POST['mat'];
}
if(empty($_POST['ordre'])){
	$ordre = '';
}else{
	$ordre = $_POST['ordre'];
}

$fiche = new Fiche($_SESSION['cin'], $mat, $ordre, $_SESSION['section']);
$data = $fiche->list_choix();

$nb = $fiche->nbrChoix();

if (isset($_POST['modifier'])){
	$modif=$fiche->changeOrdre();
	if($modif){
		header("location:../main_project/fiche_ordre.php");
	}
}

?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Orientation</title>

	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/icomoon.css">

	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">


	<link rel="stylesheet" href="css/style.css">

	<script src="js/modernizr-2.6.2.min.js"></script>
</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-1">
							<div id="fh5co-logo"><a href="index.html">Orientation<span>.tn</span></a></div>
						</div>
						<div class="col-xs-11 text-right menu-1">
							<ul>
								<li><a href="index.php">Acceuil</a></li>
								<li><a href="list_faculté.php">List Faculté</a></li>
								<li class="active"><a href="fiche_ordre.php">Ficher d'ordre</a></li>
								<li><a href="../profile/profile.php">Profile</a></li>
								<li class="btn-cta"><a href="../Inscription/login.php"><span>Déconnexion</span></a></li>
								<li></li>
								<li class="btn-cta"><a href=""><span>
											<?php
											echo $_SESSION["nom"] . " " . $_SESSION["prenom"];
											?>
										</span></a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</nav>

		<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeIn">
								<h1>Fiche D'ordre</h1>
								<h2>2020 - 2021 </h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div id="fh5co-explore" class="fh5co-bg-section">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-12 col-md-offset-0 fh5co-heading">
						<form method="post" action="fiche_ordre.php">
							<table class="table">
								<thead>
									<tr>
										<th style=' text-align: center;'>Action</th>
										<th style=' text-align: center;'>Ordre</th>
										<th style=' text-align: center;'>Matricule</th>
										<th style=' text-align: center;'>Specialité</th>
										<th style=' text-align: center;'>Nom Faculté</th>
										<th style=' text-align: center;'>Score</th>
										<th style=' text-align: center;'>Places</th>
										<th style=' text-align: center;'>Votre Score</th>
										
									</tr>
								</thead>
								<tbody>
								<?php
									if (!empty($data)) {
										$i = 0;
										while ($t = $data->fetch(\PDO::FETCH_ASSOC)) {
											$i++;
											echo "
											<form method='get' action='fiche_ordre.php'>
												<tr>
												<td>
												<input type='submit' value='modifier' class='btn btn-info' name='modifier'>
												<input type='hidden' value='".$t['matricule']."'  name='mat'>
												</td>
												<td><input type='number' name='ordre' value='".$t['ordre']."' class='form-control' style='border-radius: 3rem;'></td>
												<td style=' text-align: center;'>" . $t["matricule"] . "</td>
												<td style=' text-align: center;'>" . $t["specialite"] . "</td>
												<td style=' text-align: center;'>" . $t["nom_fac"] . "</td>
												<td style=' text-align: center;'>" . $t["score_limit"] . "</td>
												<td style=' text-align: center;'>" . $t["nb_place"] . "</td>";
											if (!empty($_SESSION["score"])) {
												echo "<td style=' text-align: center;'>" . $_SESSION["score"] . "</td>";
											}
											echo "</tr></form>";
										}
									}
									?>
								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>

	<script src="js/jquery.easing.1.3.js"></script>

	<script src="js/bootstrap.min.js"></script>

	<script src="js/jquery.waypoints.min.js"></script>

	<script src="js/jquery.stellar.min.js"></script>

	<script src="js/owl.carousel.min.js"></script>

	<script src="js/jquery.countTo.js"></script>

	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<script src="js/main.js"></script>

</body>

</html>