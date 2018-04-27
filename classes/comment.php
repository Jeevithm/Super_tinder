<?php

 check what is received through POST
	// var_dump($_POST); die();


	include('./database.php');
	$database = new Database;
	$database->connect();

  //gemmer kommentar felter i tabel
	$sql = "INSERT INTO comments (profile_to, comment) VALUES (?, ?)";

	$values = [
		$_POST["profile_to"],
		$_POST["comment"]
	];

	// function to execute the above
	$database->prepared($sql, $values);

	header("Location: superheroes.php");
?>
