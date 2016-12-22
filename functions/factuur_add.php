<?php
require_once ('./connect.php');
$pdo = ConnectDB();
var_dump($_GET);

	$factuur = $_POST["factuur"];
	$klantID = $_POST["klantID"];

	//bereid de uit te voeren query voor
	$stmt = $pdo->prepare('UPDATE mw_contracten SET contract=? WHERE id=?');


	//bind parameters aan query
	$stmt->bindParam(1, $factuur);
	$stmt->bindParam(2, $klantID);

	//voer query uit
	$stmt->execute();

//header("Location: ../index.php");
?>
