<?php
session_start();
require_once("../statistique/stat.php");
require_once("../faculte/Fac.php");

$stat = new stat();
?>
<!DOCTYPE html>
<html>
<title>Orientation.tn</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../style/sidebar.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />

<body onload="load()">
    <nav class="navbar navbar-light bg-light">
        <div class="navbar-header">
            <a class="navbar-brand" href="#" style="background-color: black;color: white;float: right;
             margin: 2rem -16rem 2rem;font-size: xx-large;
             font-family: cursive;font-style: oblique;">Orientation.tn</a>
        </div>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="margin: 1rem 13rem 1rem;">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../Inscription/login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            <li><a href="../profile/profile.php">
                    <?php
                    echo $_SESSION["nom"] . " " . $_SESSION["prenom"];
                    ?>
                </a></li>
        </ul>
        <div class="col-1" style="margin:0rem -14rem -2rem;">
            <?php
            if ($_SESSION['msg'] != '')
                echo $_SESSION["msg"];
            ?>
        </div>
    </nav>
    <div class="sidenav">
        <a target="_self" href="../profile/profile.php">Profile</a>
        <a href="#services">Services</a>
        <a href="#clients">Clients</a>
        <a href="#contact">Contact</a>
    </div>
    <div class="main">
    <input type="hidden" id="test" value="<?php echo $_SESSION['etat']; ?>"/>
    <input type="hidden" id="section" value="<?php echo $_SESSION['section']; ?>"/>
        <div class="row" style="padding: 6rem 3rem 11rem">
            <div class="col-2 " style="background-color: beige;  border-radius: 4rem;  margin: 0rem 6rem 1em;  height: 13rem;  width: 0rem;  padding: 3rem 6rem 0rem;">
                <center> Candidate:<br> 
                <?php 
                $candidate = $stat->nbrCandidate();
                if(!empty($candidate))
                echo $candidate['nb'] ;

                ?></center>
            </div>
            <div class="col-2" style="background-color: beige;  border-radius: 4rem;  margin: 0rem 6rem 1em;  height: 13rem;  width: 0rem;  padding: 3rem 9rem 0rem;">
                <center>Faculté:<br> 
                <?php 
                $fac = $stat->nbrFac();
                if(!empty($candidate))
                echo $fac['nb'] ;
                ?>
                </center>
            </div>
            <div class="col-2" style="background-color: beige;  border-radius: 4rem;  margin: 0rem 6rem 1em;  height: 13rem;  width: 0rem;  padding: 3rem 1rem 0rem;">
                <center>Candidate Science : 
                <?php 
                $sc = $stat->nbrCandidateScience();
                if(!empty($sc))
                echo $sc['nb'] ;
                ?>
                </center>
            </div>
            <div class="col-2" style="background-color: beige;  border-radius: 4rem;  margin: 0rem 6rem 1em;  height: 13rem;  width: 0rem;  padding: 3rem 1rem 0rem;">
                <center>Candidate Info :<br>
                <?php 
                $info = $stat->nbrCandidateInfo();
                if(!empty($info))
                echo $info['nb'] ;
                ?>
                </center>
            </div>
        </div>

        <div style="margin: -3rem 8rem 3rem;">
            <table class="table">
                <thead>
                    <tr>
                        <th style=" text-align: center;">Type Licence</th>
                        <th style=" text-align: center;">Matricule</th>
                        <th style=" text-align: center;">Nom Faculté</th>
                        <th style=" text-align: center;">Specialité</th>
                        <th style=" text-align: center;">Dernier Score</th>
                        <th style=" text-align: center;">Nb Place</th>
                        <th style=" text-align: center;">Info</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $fac = new Fac('','','','');
                $data = $fac->list_info();

                if(!empty($data)){
                    while($t= $data->fetch(\PDO::FETCH_ASSOC)){
                        echo "<tr>
                        <td style=' text-align: center;'>".$t["type_licence"]."</td>
                        <td style=' text-align: center;'>".$t["matricule"]."</td>
                        <td style=' text-align: center;'>".$t["nom_fac"]."</td>
                        <td style=' text-align: center;'>".$t["specialite"]."</td>
                        <td style=' text-align: center;'>".$t["nb_place"]."</td>
                        <td style=' text-align: center;'>".$t["score_limit"]."</td>
                        <td style=' text-align: center;'><button type='button' class='btn btn-info'>Info</button></td>
                    </tr>" ;
                    }
                }


                ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function load(){
            var etat = document.getElementById("test").value ;
            var section = document.getElementById("section").value ;
            if (etat == 0 && section =="I"){
                window.open("./modal_info.php");
            }else if(etat == 0 && section == "S"){
                window.open("./modal_science.php");
            }
       }
        
    </script>
</body>

</html>