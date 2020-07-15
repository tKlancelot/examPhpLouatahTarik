<?php

session_start();

require_once ('include.php');
include ('jumbotron.php');

$errors = [];

$id = $_GET['id'];

$experience = getThisExperience($bdd, $id);

if ( $_SERVER['REQUEST_METHOD'] === 'POST'){

    $errors = validateEditExperience($bdd);
    // var_dump($errors);
    // die();

    echo '<div class="row justify-content-center"><div class="col-6 border mt-4"><ul class="mt-2">';
    foreach($errors as $error){
        echo '<li class="container alert alert-danger p-1" role="alert">'.$error.'</li>';
    }            
    echo '</ul></div></div>';

    if(count ($errors) === 0){
            updateThisExperience($bdd, $id);
            // Redirection du visiteur vers la page d'accueil
            header('Location: experience.php');
    }
}
?>

<div class="row justify-content-center">
<form class='m-2 col-6 border rounded' action="editExperience.php?id=<?php echo($id);?>" method='post'>
    <!-- formulaire d'ajout de photo -->
    <h5 class='text-uppercase bg-dark text-light text-center border rounded p-1 mt-2'>éditer cette expérience professionnelle</h5>
    <div class="form-group">
    <label for="titre">éditer mon titre</label>
    <input class='form-control' type="text" name='titre' id='titre' placeholder="titre de l'expérience" value="<?php echo($experience['titre']) ?>">
    </div>

    <div class="form-group">
    <label for="description">éditer la description</label>
    <textarea placeholder='décrivez votre expérience en quelques mots' class='form-control' type="text" name='description' id='description'>
    <?php echo($experience['description']) ?>
    </textarea>
    </div>

    <div class="form-group">
    <label for="date_debut">éditer la date de début</label>
    <input class='form-control' type="date" name='date_debut' id='date_debut' value="<?php echo($experience['date_debut']) ?>">
    </div>

    <div class="form-group">
    <label for="date_fin">éditer la date de fin</label>
    <input class='form-control' type="date" name='date_fin' id='date_fin' value="<?php echo($experience['date_fin']) ?>">
    </div>
    
    <div class="form-group">
    <input class='col-2 btn btn-success' type="submit" value='insérer'>
    <a class='col-2 btn btn-warning' href="experience.php">retour</a>
    </div>

</form>
</div>
