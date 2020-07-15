<?php

session_start();

include ('include.php');
include ('jumbotron.php');
// require_once 'functions.php';

$id = $_GET['id'];
deleteCompetence($bdd, $id);
header('Location: competence.php');

?>