<?php
require_once ('./connect.php');
$pdo = ConnectDB();
//var_dump($_POST);

	$dienst = $_POST["dienst"];

	//bereid de uit te voeren query voor
	$stmt = $pdo->prepare('INSERT INTO mw_diensten (dienst_name) VALUES (?)');

	//bind parameters aan query
	$stmt->bindParam(1, $dienst);

	//voer query uit
	$stmt->execute();

header("Location: ../dienst_add_form.php");
?>
