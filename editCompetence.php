<?php

session_start();

require_once ('include.php');
include ('jumbotron.php');

$errors = [];

$id = $_GET['id'];

$competence = getThisCompetence($bdd, $id);

if ( $_SERVER['REQUEST_METHOD'] === 'POST'){

    $errors = validateEditCompetence($bdd);
    // var_dump($errors);
    // die();

    echo '<div class="row justify-content-center"><div class="col-6 border mt-4"><ul class="mt-2">';
    foreach($errors as $error){
        echo '<li class="container alert alert-danger p-1" role="alert">'.$error.'</li>';
    }            
    echo '</ul></div></div>';

    if(count ($errors) === 0){
            updateThisCompetence($bdd, $id);
            // Redirection du visiteur vers la page d'accueil
            header('Location: competence.php');
    }
}
?>

<div class="row justify-content-center">
<form class='m-2 col-6 border rounded' action="editCompetence.php?id=<?php echo($id);?>" method='post'>
    <h5 class='text-uppercase bg-dark text-light text-center border rounded p-1 mt-2'>éditer cette compétence</h5>
    <div class="form-group">
    <label for="titre">éditer le titre</label>
    <input minlength='4' type="text" name='titre' id='titre' value="<?php echo($competence['titre']) ?>" class="form-control"> 
    </div>
    <div class="form-group">
    <label for="note">éditer la note</label>
    <input type="number" class='form-control col-1' name='note' min="0" max="5"value="<?php echo($competence['note']) ?>" class="form-control">
    </input>
    </div>
    <div class="form-group">
    <input class='col-2 btn btn-success' type="submit" value='modifier'>
    <a class='col-2 btn btn-warning' href="competence.php">retour</a>
    </div>
</form>
</div>
