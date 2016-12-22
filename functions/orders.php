<?php
require_once ('./connect.php');
$pdo = ConnectDB();
if(isset($_POST['func'])){ $func = $_POST['func']; }
elseif(isset($_GET['func'])){ $func = $_GET['func']; }
else {$func = 'all';}


switch ($func) {
    case 'all':
        alles($pdo);
        break;
    case 'editor':
        editor($pdo);
        break;
}

function alles($pdo) {
  $stmt = $pdo->prepare( 'SELECT a.*, b.first_name, c.dienst_name, d.order_id
                          FROM mw_contracten a
                          LEFT JOIN ab_contacts b ON a.klant_id = b.id
                          LEFT JOIN mw_diensten c ON a.dienst_id = c.id
                          LEFT JOIN bs_orders d ON a.contract = d.id');
  $stmt->execute();

  if($stmt->rowCount() > 0) {
    while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      $rows['data'] = $row;

    }
    print json_encode($rows);
  }
}

function editor($pdo) {
  $stmt = $pdo->prepare( 'SELECT b.order_id, from_unixtime(b.ctime, "%D %M %Y") AS date, b.subtotal, c.name AS status
                          FROM mw_contracten a
                          LEFT JOIN bs_orders b ON a.contract = b.id
                          LEFT JOIN bs_status_languages c ON b.status_id = c.status_id WHERE a.id = ' . $_POST['id']);
  $stmt->execute();

  if($stmt->rowCount() > 0) {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $rows = $row;

    }
    print json_encode($rows);
  }
}


?>
