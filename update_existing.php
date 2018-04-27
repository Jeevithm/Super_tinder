<?php
// Include and initiate the database class 
include('./classes/database.php');
$database = new Database;
$database->connect();

// Siden hvor du updater din bruger, og derefter submit for dens update.
$user_being_edited = $database->query("SELECT * FROM superheroes WHERE id = " . $_GET["user_being_edited"])[0];
?>
<!DOCTYPE html>
<html>
<head>
	<title>super_tinder who would you like to date?</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <form action="../update.php" method="post">
    <input type="hidden" name="user_being_edited" value="<?php echo $user_being_edited["id"];?>">
    <p>E-mail: </p><input type="text" name="email" value="<?php echo $user_being_edited["email"];?>">
    <p>Name: </p><input type="text" name="name" value="<?php echo $user_being_edited["name"];?>">
    <p>Age: </p><input type="text" name="age" value="<?php echo $user_being_edited["age"];?>">
    <p>Gender: </p><input type="text" name="gender" value="<?php echo $user_being_edited["gender"];?>">
    <p>Image: </p><input type="text" name="image" value="<?php echo $user_being_edited["image"];?>">
    <br>
    <br>
    <button type="submit" name="button">Submit</button>
  </form>
</body>
</html>
