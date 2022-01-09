<?php
session_start();
require_once("../statistique/stat.php");
require_once("../faculte/Fac.php");

$stat = new stat();
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
	<body style="overflow: hidden;" onload="load()">
		
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
							<li class="active"><a href="index.html">Acceuil</a></li>
							<li><a href="list_faculté.php">List Faculté</a></li>
							<li><a href="fiche_ordre.php">Ficher d'ordre</a></li>
							<li><a href="../profile/profile.php">Profile</a></li>
							<li class="btn-cta"><a href="../Inscription/login.php"><span>Déconnexion</span></a></li>
							<li></li>
							<li class="btn-cta"><a href=""><span>
							<?php
								echo $_SESSION["nom"] . " " . $_SESSION["prenom"];
							?>
							<li class="btn-cta"><a href=""><span>
							<?php
								if ($_SESSION['msg'] != '')
									echo $_SESSION["msg"];
            				?>
							</span></a></li>
							</span></a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);" data-stellar-background-ratio="0.5">
	<input type="hidden" id="test" value="<?php echo $_SESSION['etat']; ?>"/>
    <input type="hidden" id="section" value="<?php echo $_SESSION['section']; ?>"/>
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Site D'orientation Universitaire Pour L'année 2020 - 2021</h1>
							<div id="fh5co-counter" class="fh5co-counters">
									<div class="row">
										<div class="col-md-3 text-center animate-box">
											<span class="fh5co-counter js-counter" data-from="0" 
											data-to="
												<?php 
													$candidate = $stat->nbrCandidate();
													if(!empty($candidate))
													echo $candidate['nb'] ;
												?>
											" 
											data-speed="5000" data-refresh-interval="50"></span>
											<span class="fh5co-counter-label">Etudiants</span>
										</div>
										<div class="col-md-3 text-center animate-box">
											<span class="fh5co-counter js-counter" data-from="0" data-to="
											<?php 
												$fac = $stat->nbrFac();
												if(!empty($candidate))
												echo $fac['nb'] ;
											?>
											" 
											data-speed="5000" data-refresh-interval="50"></span>
											<span class="fh5co-counter-label">Facultés</span>
										</div>
										<div class="col-md-3 text-center animate-box">
											<span class="fh5co-counter js-counter" data-from="0" data-to="
											<?php 
												$sc = $stat->nbrCandidateScience();
												if(!empty($sc))
												echo $sc['nb'] ;
											?>
											" 
											data-speed="5000" data-refresh-interval="50"></span>
											<span class="fh5co-counter-label">Etudiants Science</span>
										</div>
										<div class="col-md-3 text-center animate-box">
											<span class="fh5co-counter js-counter" data-from="0" data-to="
											<?php 
												$info = $stat->nbrCandidateInfo();
												if(!empty($info))
												echo $info['nb'] ;
											?>
											"
											 data-speed="5000" data-refresh-interval="50"></span>
											<span class="fh5co-counter-label">Etudiants Informatique</span>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<script>
        function load(){
            var etat = document.getElementById("test").value ;
            var section = document.getElementById("section").value ;
            if (etat == 0 && section =="I"){
                window.open("../Acceuil/modal_info.php");
            }if(etat == 0 && section == "S"){
                window.open("../Acceuil/modal_science.php");
            }
       }
        
    </script>
	</body>
</html>

