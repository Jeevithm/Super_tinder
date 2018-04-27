<?php

class Database {

	public $connection; // this stores the connection

	// Create a connection
	public function connect() {

		$servername = "localhost";
		$username = "root";
		$password = "";
		$databasename = "super_tinder";

		try {
		    $this->connection = new PDO("mysql:host=$servername;dbname=".$databasename, $username, $password);
		    // set the PDO error mode to exception
		    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    //echo "Connected successfully";

	    }
		catch(PDOException $e) {
		    echo "Database connection failed: " . $e->getMessage();
		    die();
	    }
	}

	// To be used for all SELECT and DELETE (no prepared statements)
	public function query($sql) {
		$query = $this->connection->query($sql);
		return $query->fetchAll();
	}

	public function queryWithoutFetchAll($sql) {
		$query = $this->connection->query($sql);
	}

	// To be used for all prepared statements
	// 	$sql [string] - The sql to be prepared with palceholders
	// 	$values [array] - The values to binded to the placeholders
	public function prepared($sql,$values) {
		try {
			$statement = $this->connection->prepare($sql);
			$statement->execute($values);
		}
		catch(PDOException $e) {
		    echo "Could not perform prepared statements: " . $e->getMessage();
		    die();
	    }

	}

}

?>
