<?php
$superhero_from = $_GET["superhero_from"];
$superhero_to = $_GET["superhero_to"];
include('classes/database.php');
$database = new Database;
$database->connect();

// Gemmer likes i databasen og fremviser for profilen
$sql = "INSERT INTO likes (superhero_from, superhero_to) VALUES ($superhero_from, $superhero_to)";

$database->queryWithoutFetchAll($sql);

//redirecter tilbage til forsiden
header("Location: ../superheroes.php");
