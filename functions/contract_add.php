<?php
require_once ('./connect.php');
$pdo = ConnectDB();
var_dump($_POST);
	$klant_id = $_POST["klant_id"];
  $dienst_id = $_POST["dienst_id"];
  $bedrag = $_POST["bedrag"];
	$ingang = date("Y-m-d", strtotime($_POST['ingang']));
	$duur = $_POST['duur'];
  $einddatum = date('Y-m-d', strtotime($_POST["einddatum"]));
	$contract = $_POST["contract"];
  $opmerking = $_POST["opmerking"];

	//bereid de uit te voeren query voor
	$stmt = $pdo->prepare('INSERT INTO mw_contracten (klant_id, dienst_id, bedrag, ingang, duur, eind_datum, contract, opmerking) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

	//bind parameters aan query
	$stmt->bindParam(1, $klant_id);
	$stmt->bindParam(2, $dienst_id);
	$stmt->bindParam(3, $bedrag);
	$stmt->bindParam(4, $ingang);
	$stmt->bindParam(5, $duur);
	$stmt->bindParam(6, $einddatum);
	$stmt->bindParam(7, $contract);
	$stmt->bindParam(8, $opmerking);

	//voer query uit
	$stmt->execute();

//header("Location: ../contract_add_form.php");
?>
