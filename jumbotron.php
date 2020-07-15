
<?php

$dev = ['tarik',33,'dev','examen php cv','12 rue des bierces', '42270 Saint-Priest-En-Jarez'];
// $key = hex2bin('21232f297a57a5a743894a0e4a801fc3');

if(isset($_SESSION['user'])){

    echo '<div class="menu container col-10 mt-4 mb-4 jumbotron text-light">
    <p class="lead text-uppercase">tp réalisé par ' .$dev[0]. ' | nom du projet : ' .$dev[3]. '</p> 
    <p>Bonjour ' .$_SESSION['user']['nom'].' !</p>
    <p>tu es dans ton espace administrateur</p>
    <p>ton mot de passe est <b class="text-warning">' .$_SESSION['user']['mot_de_passe']. '</b></p>    
    <ul class="text-uppercase display-5 bg-primary rounded cadre"> 
    <li><a href="competence.php">gérer mes compétences</a></li>
    <li><a href="experience.php">gérer mes expériences</a></li>
    <li><a href="disconnect.php"/><i class="fas fa-sign-out-alt"></i>&nbsp;je me déconnecte</a></li>
    </ul>
    </div>';
}
else{

    echo '
    <div class="menu container col-10 mt-4 mb-4 jumbotron text-light">
    <p class="lead text-uppercase">tp réalisé par ' .$dev[0]. ' | nom du projet : ' .$dev[3]. '</p> 
    <h5 class="text-uppercase">bienvenue sur mon c.v en php</h5>
    <ul class="text-uppercase"> 
    <li><a href="index.php"><i class="fas fa-home"></i>&emsp;retour</a></li>
    </ul>
    </div>';
}

?>