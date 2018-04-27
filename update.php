<?php

include('classes/database.php');
$database = new Database;
$database->connect();

// updater profiler
$sql = "UPDATE superheroes SET
                                image = '" . $_POST['image'] .
                                "', name = '" . $_POST['name'] .
                                "', email = '" . $_POST['email'] .
                                "', age = '" . $_POST['age'] .
                                "', gender = '" . $_POST['gender'] .
                                "', location = '" . $_POST['location'] .

          "' WHERE id = " . $_POST["user_being_edited"];


$database->queryWithoutFetchAll($sql);

header("Location: superheroes.php");

?>
