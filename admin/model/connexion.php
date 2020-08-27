<?php
require_once('../include/config.php');
session_start();
  if ($_SESSION['isAdmin']) {
      echo "Welcome " . $_SESSION['authUser'];
      header('Location: ../index.php');
      exit;
  }
  else {
      echo "Get out you're not authorized";
  }
?>
