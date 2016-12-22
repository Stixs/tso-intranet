<?php

function ConnectDB()
{
	require_once ("config.php");

	try {
	  $pdo = new PDO("mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME", $DATABASE_USER, $DATABASE_PASS);
		return $pdo;
	}
	catch (PDOException $error) {
	  print "Error!: " . $error->getMessage() . "<br/>";
	  die();
	}
}


function CloseDB()
{
	$pdo = null;
}


?>
