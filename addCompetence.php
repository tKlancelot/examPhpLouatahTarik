<?php

session_start();

require_once ('include.php');
include ('jumbotron.php');

$errors = [];
// $errors = [];

if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = validateFormCompetence($bdd);

    echo '<div class="row justify-content-center"><div class="col-6 border mt-4"><ul class="mt-2">';
    foreach($errors as $error){
        echo '<li class="alert alert-danger p-1" role="alert">'.$error.'</li>';
    }            
    echo '</ul></div></div>';
    

    if(count($errors) === 0){
            // echo 'ok !';
            validateFormCompetence($bdd);
            $errors = addCompetence($bdd);
            header('Location: competence.php');
    }
}

if (isset($_SESSION['user'])){
?>
<div class="row justify-content-center">
<form class='m-2 col-6 border rounded' action="addCompetence.php" method='post'>
    <h5 class='text-uppercase bg-dark text-light text-center border rounded p-1 mt-2'>ajouter une compétence</h5>
    <div class="form-group">
    <label for="titre">ajouter un titre</label>
    <input class='form-control' minlength='4' type="text" name='titre' id='titre' placeholder='titre de la compétence'>
    </div>
    <div class="form-group">
    <label for="note">note</label>
    <input type="number" class='form-control col-1' name='note' min="0" max="5">
    </input>
    </div>
    <div class="form-group">
    <input class='col-2 btn btn-success' type="submit" value='publier'>
    <a class='col-2 btn btn-warning' href="competence.php">retour</a>
    </div>
</form>
</div>
<?php
}
?>