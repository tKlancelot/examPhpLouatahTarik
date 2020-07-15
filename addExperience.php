<?php

session_start();

require_once ('include.php');
include ('jumbotron.php');

$errors = [];
// $errors = [];

if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = validateFormExperience($bdd);

    echo '<div class="row justify-content-center"><div class="col-6 border mt-4"><ul class="mt-2">';
    foreach($errors as $error){
        echo '<li class="alert alert-danger p-1" role="alert">'.$error.'</li>';
    }            
    echo '</ul></div></div>';
    

    if(count($errors) === 0){
            // echo 'ok !';
            validateFormExperience($bdd);
            $errors = addExperience($bdd);

            header('Location: experience.php');
    }
}

if (isset($_SESSION['user'])){
?>
<div class="row justify-content-center">
<form class='m-2 col-6 border rounded' action="addExperience.php" method='post'>
    <!-- formulaire d'ajout de photo -->
    <h5 class='text-uppercase bg-dark text-light text-center border rounded p-1 mt-2'>ajouter une expérience professionnelle</h5>
    <div class="form-group">
    <label for="titre">ajouter un titre</label>
    <input class='form-control' type="text" name='titre' id='titre' placeholder="titre de l'expérience">
    </div>

    <div class="form-group">
    <label for="description">description de cette expérience</label>
    <textarea placeholder='décrivez votre expérience en quelques mots' class='form-control' type="text" name='description' id='description'>
    </textarea>
    </div>

    <div class="form-group">
    <label for="date_debut">date de début</label>
    <input class='form-control' type="date" name='date_debut' id='date_debut'>
    </div>

    <div class="form-group">
    <label for="date_fin">date de fin</label>
    <input class='form-control' type="date" name='date_fin' id='date_fin'>
    </div>
    
    <div class="form-group">
    <input class='col-2 btn btn-success' type="submit" value='insérer'>
    <a class='col-2 btn btn-warning' href="experience.php">retour</a>
    </div>

</form>
</div>
<?php
}
?>