<?php
session_start();
include_once("../Admin/fac_admin.php");
extract($_POST);
if(empty($_POST['matricule'])){
    $matricule = '';
}else{
    $matricule = $_POST['matricule'];
}

if(empty($_POST['nom_faculte'])){
    $nom_faculte = '';
}else{
    $nom_faculte = $_POST['nom_faculte'];
}
if(empty($_POST['specialite'])){
    $specialite = '';
}else{
    $specialite = $_POST['specialite'];
}
if(empty($_POST['type_licence'])){
    $type_licence = '';
}else{
    $type_licence = $_POST['type_licence'];
}
if(empty($_POST['section'])){
    $section = '';
}else{
    $section = $_POST['section'];
}
if(empty($_POST['score_limite'])){
    $score_limite = '';
}else{
    $score_limite = $_POST['score_limite'];
}
if(empty($_POST['nb_places'])){
    $nb_places = '';
}else{
    $nb_places = $_POST['nb_places'];
}

$fac = new Fac_Admin($matricule,$nom_faculte,$specialite,$type_licence,$section,$score_limite,$nb_places);
$data = $fac->list_info();
$data_sc = $fac->list_science();

if(isset($_POST['ajouter'])){
$result = $fac->insert_fac();

}

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
	<link rel="stylesheet" href="vcss/owl.theme.default.min.css">


	<link rel="stylesheet" href="../css/style.css">

	<script src="../js/modernizr-2.6.2.min.js"></script>
</head>

<body>

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
								<li><a href="../Admin/acceuil.php">Acceuil</a></li>
								<li class="active"><a href="../Admin//list_faculte_admin.php">Liste Facultés</a></li>
								<li><a href="fiche_ordre.php">Liste Candidats</a></li>
								<li class="btn-cta"><a href="../../Inscription/login.php"><span>Déconnexion</span></a></li>
								<li></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</nav>

		<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(../images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeIn">
								<h1>List Faculté</h1>
								<h2>2020 - 2021 </h2>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div id="fh5co-explore" class="fh5co-bg-section">
			<div class="container">
				<div class="row animate-box">
                <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne">
                                            Ajouter une Faculté
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <form method="POST" action="list_faculte_admin.php">
                                            <div class="row" style="padding: 0rem 26rem 0rem;margin: 2rem -25rem 0rem;">
                                                <div class="col-md-2">
                                                <div class="form-group">
                                                        <label for="exampleInputEmail1">Matricule</label>
                                                        <input type="text" class="form-control"
                                                               placeholder="Matricule"
                                                               style="border-radius: 3rem;" name="matricule">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nom Faculté</label>
                                                        <input type="text" class="form-control"
                                                               placeholder="Nom Faculté"
                                                               style="border-radius: 3rem;" name="nom_faculte">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Specialité</label>
                                                        <input type="text" class="form-control"
                                                               placeholder="Specialité"
                                                               style="border-radius: 3rem;" name="specialite">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Type Licence</label>
                                                        <input type="text" class="form-control"
                                                               placeholder="Type Licence"
                                                               style="border-radius: 3rem;" name="type_licence">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0rem 26rem 0rem;margin: 2rem -25rem 0rem;">
                                                <div class="col-md-2">
                                                <div class="form-group" style="padding: 0rem 2rem 0rem;">
                                                        <label for="exampleInputEmail1">Section</label>
                                                        <select class="form-select" aria-label="Default select example"
                                                                name="section"
                                                                style="border-radius: 3rem;padding: 1rem 2rem 2rem;">
                                                            <option selected>Selectionner Section</option>
                                                            <option value="I">Info</option>
                                                            <option value="S">Science</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Score limite</label>
                                                        <input type="text" class="form-control"
                                                               placeholder="Score limite"
                                                               style="border-radius: 3rem;" name="score_limite">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nb Places</label>
                                                        <input type="text" class="form-control"
                                                               placeholder="Nb Places"
                                                               style="border-radius: 3rem;" name="nb_places">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-info" value="Ajouter uune faculté" name='ajouter' style="margin-top: 3rem;float: right;">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
					<div class="col-md-12 col-md-offset-0 fh5co-heading">
                    
						<table class="table">
							<thead>
								<tr>
                                    <th style=' text-align: center;'>Action</th>
									<th style=' text-align: center;'>Section</th>
									<th style=' text-align: center;'>Type Licence</th>
									<th style=' text-align: center;'>Specialité</th>
									<th style=' text-align: center;'>Nom Faculté</th>
									<th style=' text-align: center;'>Matricule</th>
									<th style=' text-align: center;'>Score</th>
									<th style=' text-align: center;'>Places</th>
									
								</tr>
							</thead>
							<tbody>
                            <?php
                            if(!empty($data)){
									$i=0;
									while($t= $data->fetch(\PDO::FETCH_ASSOC)){
										$i++;
										echo "<tr>
                                        <td><input type='submit' class='btn btn-danger' value='Retirer' style='margin-bottom: 1rem;'>
                                        <input type='submit' class='btn btn-primary' value='Modifier'></td>
                                        <td style=' text-align: center;'>Info</td>
										<td style=' text-align: center;'>".$t["type_licence"]."</td>
										<td style=' text-align: center;'>".$t["specialite"]."</td>
										<td style=' text-align: center;'>".$t["nom_fac"]."</td>
										<td style=' text-align: center;'>".$t["matricule"]."</td>
										<td style=' text-align: center;'>".$t["score_limit"]."</td>
										<td style=' text-align: center;'>".$t["nb_place"]."</td>";
									}
								}
                            if(!empty($data_sc)){
                                $i=0;
                                while($t= $data_sc->fetch(\PDO::FETCH_ASSOC)){
                                    $i++;
                                    echo "<tr>
                                    <td><input type='submit' class='btn btn-danger' value='Retirer' style='margin-bottom: 1rem;'>
                                    <input type='submit' class='btn btn-primary' value='Modifier'></td>
                                    <td style=' text-align: center;'>Science</td>
                                    <td style=' text-align: center;'>".$t["type_licence"]."</td>
                                    <td style=' text-align: center;'>".$t["specialite"]."</td>
                                    <td style=' text-align: center;'>".$t["nom_fac"]."</td>
                                    <td style=' text-align: center;'>".$t["matricule"]."</td>
                                    <td style=' text-align: center;'>".$t["score_limit"]."</td>
                                    <td style=' text-align: center;'>".$t["nb_place"]."</td>";
                                    
                                }
                            }
                                ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
							
	<script src="../js/jquery.min.js"></script>

	<script src="../js/jquery.easing.1.3.js"></script>

	<script src="../js/bootstrap.min.js"></script>

	<script src="../js/jquery.waypoints.min.js"></script>

	<script src="../js/jquery.stellar.min.js"></script>

	<script src="../js/owl.carousel.min.js"></script>

	<script src="../js/jquery.countTo.js"></script>

	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	<script src="../js/main.js"></script>
</body>

</html>