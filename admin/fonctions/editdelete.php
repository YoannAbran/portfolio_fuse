<?php

include "../include/config.php";

if (isset($_POST['delimg'])) {
$id = $_GET['id'];
$idimg = $_GET['imgdel'];
try {
  $del = $conn-> prepare("DELETE FROM images WHERE id_image = $idimg");
  $del->execute();
  echo "Record deleted successfully";
  header('Location: ../projetest-'.$id.'.html');
  exit;
}
  catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
}
