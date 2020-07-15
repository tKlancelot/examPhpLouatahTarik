<?php

require_once ('include.php');

if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = validateLoginAdmin($bdd);

    echo '<div class="container border mt-4"><ul class="mt-2">';
    foreach($errors as $error){
        echo '<li class="alert alert-danger p-1" role="alert">'.$error.'</li>';
    }            
    echo '</ul></div>';
    

    if(count($errors) === 0){
            // echo 'ok !';
            validateLoginAdmin($bdd);
            $errors = connectUser($bdd);
            echo '<div class="container border mt-4"><ul class="mt-2">';
            foreach($errors as $error){
                echo '<li class="alert alert-danger p-1" role="alert">'.$error.'</li>';
            }            
            echo '</ul></div>';
            // var_dump($errors); 
    }
}

?>

<!-- page de connexion / administrateur -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
</head>
<body>
    <form class='container border rounded mt-4' action="index.php" method='post'>
        <h5 class='text-uppercase text-secondary mt-1'>connexion admin</h5>
        <div class="form-group">
        <label for="email">email</label>
        <input class='form-control' type="email" name='email'>
        </div>


        <div class="form-group">
        <label for="mot_de_passe">mot de passe</label>
        <input class='form-control' type="password" name='mot_de_passe'>
        </div>


        <div class="form-group">
        <input class='col-2 btn btn-info mb-2 p-1' type="submit" value='se connecter'>
        <a class='col-2 btn btn-info mb-2 p-1' href="home.php">accès site</a>
        </div>
    </form>

</body>
</html>
