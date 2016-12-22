<?php
require_once ('./connect.php');
$pdo = ConnectDB();
//$_GET['query'] = 'a';
if (isset($_GET['query'])) {

  $verzoek = $_GET['query'];
  $stmt = $pdo->prepare("SELECT first_name AS name, id AS value FROM ab_contacts WHERE first_name LIKE '%$verzoek%'");
  $stmt->execute();
    if($stmt->rowCount() > 0) {
      $rows = array();
      while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        $rows = $row;
      }
    }
  }
    print json_encode($rows);
  //  print "<pre>" . json_encode($rows, JSON_PRETTY_PRINT) . "</pre>";
?>
