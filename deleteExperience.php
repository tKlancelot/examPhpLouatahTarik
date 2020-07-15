<?php

session_start();

include ('include.php');
include ('jumbotron.php');
// require_once 'functions.php';

$id = $_GET['id'];

deleteExperience($bdd, $id);

header('Location: experience.php');

?>