<?php

//connexion

function validateLoginAdmin($bdd){
    $errors = [];
    if(empty($_POST['email'])){
        $errors[] = 'renseigner l\'email';
    }
    if(empty($_POST['mot_de_passe'])){
        $errors[] = 'renseigner le mot de passe';
    }

    return $errors;
}


function connectUser($bdd){
    $errors=[];

    $res = $bdd -> prepare('SELECT * FROM user WHERE mot_de_passe = :mot_de_passe AND email = :email');
    $res -> execute([
        'mot_de_passe' => hash('md5',($_POST['mot_de_passe'])),
        'email' => $_POST['email']
    ]);

    $res = $res->fetch();

    if(!$res){
        // echo ('pas ok');
        $errors[] = 'identifiant ou mot de passe incorrect';
        return $errors;
    }
    else{
        session_start();
        $_SESSION['user'] = $res;
  
        header('Location: home.php');
    }

}

function addExperience($bdd){

    $req = $bdd->prepare('INSERT INTO experience (titre, description, date_debut, date_fin) VALUES(:titre,:description,:date_debut,:date_fin)');
    $req->execute([
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'date_debut' => $_POST['date_debut'],
        'date_fin' => ($_POST['date_fin'])
    ]);
}

function validateFormExperience() {

    $errors = [];
    
    if (empty($_POST['titre'])) {
        $errors[] = 'saisir un titre';
    }
    if(strlen($_POST['titre']<=4)){
        $errors[] = 'le titre doit dépasser 4 caractères';
    }
    if (empty($_POST['description'])) {
        $errors[] = 'saisir une description';
    }
    if(strlen($_POST['description'])<=20){
        $errors[] = 'renseigner plus d\'information sur cette expérience';
    }
    if (empty($_POST['date_debut'])) {
        $errors[] = 'merci de renseigner la date de début';
    }

    return $errors;
}

function addCompetence($bdd){

    $req = $bdd->prepare('INSERT INTO competence (titre, note) VALUES(:titre,:note)');
    $req->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note']
    ]);
}

function validateFormCompetence() {

    $errors = [];

    if (empty($_POST['titre'])) {
        $errors[] = 'saisir un titre';
    }

    if (empty($_POST['note'])) {
        $errors[] = 'merci de noter la compétence';
    }

    // if (isset($_POST['note'])){
    //     $_POST['note'] = $input;
    // }

    // switch ($input) {
    //     case 0:
    //         $etoile = "i égal 0";
    //         break;
    //     case 1:
    //         $etoile = "i égal 1";
    //         break;
    //     case 2:
    //         $etoile = "i égal 2";
    //         break;
    //     case 3:
    //         $etoile = "i égal 2";
    //         break;
    //     case 4:
    //         $etoile = "i égal 2";
    //         break;
    //     case 5:
    //         $etoile = "i égal 2";
    //         break;
    // }

    return $errors;
}

// fonctions delete

function deleteCompetence($bdd, $id)
{
    $res = $bdd->prepare('DELETE FROM competence WHERE id = :id');
    $res->execute(['id'=> $id]);
}

function deleteExperience($bdd, $id)
{
    $res = $bdd->prepare('DELETE FROM experience WHERE id = :id');
    $res->execute(['id'=> $id]);
}

// update compétence 

function getThisCompetence($bdd,$id)
{
    $res = $bdd->prepare('SELECT * FROM competence WHERE id = :id');
    $res->execute(['id'=> $id]);
    return $res->fetch();
}



function updateThisCompetence($bdd,$id){
    $req = $bdd->prepare('UPDATE competence SET titre = :titre, note = :note  WHERE id = :id');
    $req->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note'],
        'id'=> $id
    ]);
}


function validateEditCompetence() {
    
    $errors = [];
    
    if (empty($_POST['titre'])) {
        $errors[] = 'saisir un titre';
    }

    if (empty($_POST['note'])) {
        $errors[] = 'merci de noter la compétence';
    }
    
    return $errors;
}

// update expérience 

function getThisExperience($bdd,$id)
{
    $res = $bdd->prepare('SELECT * FROM experience WHERE id = :id');
    $res->execute(['id'=> $id]);
    return $res->fetch();
}


function updateThisExperience($bdd,$id){
    $req = $bdd->prepare('UPDATE experience SET titre = :titre, description = :description, date_debut = :date_debut, date_fin = :date_fin WHERE id = :id');
    $req->execute([
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'date_debut' => $_POST['date_debut'],
        'date_fin' => $_POST['date_fin'],
        'id'=> $id
    ]);
}


function validateEditExperience() {
    
    $errors = [];
    
    if (empty($_POST['titre'])) {
        $errors[] = 'saisir un titre';
    }

    if (empty($_POST['description'])) {
        $errors[] = 'merci d\'éditer la description';
    }

    if (empty($_POST['date_debut'])) {
        $errors[] = 'merci de saisir une date valide';
    }
    
    return $errors;
}



?>