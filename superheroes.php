<?php
// Include and initiate the database class (you only have to do this once)
include('./classes/database.php');
$database = new Database;
$database->connect();

// Logged ind som ID
$logged_in_superhero = $database->query("SELECT * FROM superheroes WHERE id = 1")[0];
?>
<!DOCTYPE html>
<html>
<head>
	<title>super_tinder who would you like to date?</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Super Tinder - where you can find your super love</h1>
<a href="add_new.php" class="add_new notice">Add new</a>
<?php

// ensure that php errors are displayed
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



	// Get all the superheroes
	$superheroes = $database->query('SELECT * FROM superheroes');
	//var_dump($titles);

	// Loop through all superheroes
	foreach ($superheroes as $superhero) {
		$amount_of_likes = $database->query("SELECT COUNT(id) FROM likes WHERE superhero_to = " . $superhero["id"])[0]["COUNT(id)"];
		?>
		<article class="title">
			<h3>E-mail: <?php echo $superhero['email'];?> </h3>
			<h3>Name: <?php echo $superhero['name'];?></h3>
      <h3>Age: <?php echo $superhero['age'];?></h3>
      <h3>Gender: <?php echo $superhero['gender'];?></h3>
			<h3><img src="<?php echo $superhero['image'];?>"></h3>
			<?php
				if($superhero["id"] != $logged_in_superhero["id"]) {
			?>
				<a  href="./like.php/?superhero_from=<?php echo $logged_in_superhero['id'];?>&superhero_to=<?php echo $superhero['id'];?>">Like (<?php echo $amount_of_likes;?>)</a>
			<?php
			}
		  ?>
			<a href="update_existing.php/?user_being_edited=<?php echo $superhero['id'];?>" class="add_new notice">Update</a>

		<form class="comment" action="/super_tinder/superheroes.php" method="POST">
			<input type="submit" value="comment">
		</form>

		</article>
		<?php
	}
?>
</body>
</html>
