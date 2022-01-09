<?php
session_start();
require_once("../../faculte/Fac.php");
$fac = new Fac('','','','','','');

?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Orientation</title>

	<link rel="stylesheet" href="../css/animate.css">

	<link rel="stylesheet" href="../css/icomoon.css">

	<link rel="stylesheet" href="../css/bootstrap.css">

	<link rel="stylesheet" href="../css/magnific-popup.css">

	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">

	<link rel="stylesheet" href="../css/style.css">

	<script src="../js/modernizr-2.6.2.min.js"></script>


	</head>
	<body style="overflow: hidden;" onload="load()">
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-1">
						<div id="fh5co-logo"><a href="../Admin/acceuil.php">Orientation<span>.tn</span></a></div>
					</div>
					<div class="col-xs-11 text-right menu-1">
						<ul>
							<li class="active"><a href="../Admin/acceuil.php">Acceuil</a></li>
							<li><a href="../Admin/list_faculte_admin.php">List Faculté</a></li>
							<li><a href="#">List candidats</a></li>
							<li class="btn-cta"><a href="../../Inscription/login.php"><span>Déconnexion</span></a></li>
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

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(../images/img_bg_1.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>DASHBOARD ADMIN</h1>
                            <h2> 2020-2021</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>	
	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- countTo -->
	<script src="../js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>

	</body>
</html>

