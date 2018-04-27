<!DOCTYPE html>
<html>
<head>
	<title>Add new</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
// Get all types from the database
	include('classes/database.php');
	$database = new Database;
	$database->connect();

	// Select all types
	$sql = "SELECT * FROM superheroes";
	$types = $database->query($sql);
?>

  <form action="process.php" method="post">
		<label for="image">Image</label>
		<input type="text" name="image" placeholder="absolute url to image">

  	<label for="name">Name</label>
  	<input type="text" name="name" placeholder="e.g. spiderman">

		<label for="age">Age</label>
		<input type="text" name="age" placeholder="e.g. 28">

		<label for="email">E-mail</label>
		<input type="text" name="email" placeholder="e.g. spiderman@dolan.dk">

  	<label for="gender">Gender</label>
  	<input type="text" name="gender" placeholder="male, female etc.">

		<label for="location">Location</label>
  	<input type="text" name="location" placeholder="planet, countries etc.">


  	<input type="submit" name="submit" value="Add">
  </form>
</body>
</html>
