<?php
$id = $_GET['idel'];
include '../include/config.php';


$del = "DELETE FROM projet WHERE id_projet = $id";
 $conn->exec($del);
  echo "Record deleted successfully";
header('Location: ../index.php');
exit;
?>
