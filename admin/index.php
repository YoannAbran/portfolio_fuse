<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
  if ($_GET['action'] == 'create') {
    Admin();
    require("view/createView.php");
  }

else if ($_GET['action'] == 'login') {
  loginConnexion();
  require("view/loginView.php");
}

else if ($_GET['action'] == 'about') {
    Admin();
    about();
    aboutView();
  }

else if ($_GET['action'] == 'aboutView') {
    Admin();
    aboutView();
  }

else if ($_GET['action'] == 'edit') {
    Admin();
    edit();
  }

else if ($_GET['action'] == 'deleteimg') {
  if (isset($_GET['imgdel'])) {
    Admin();
    deleteimgControl();
  }
}

else if ($_GET['action'] == 'delete') {
  if (isset($_POST['suppr'])) {
    if (isset($_GET['idel'])) {
      Admin();
      deleteControl();
    }
  }
}

else if ($_GET['action'] == 'insertnew') {
if (isset($_POST['submit'])) {
    Admin();
    create($_POST['titre'], $_POST['description']);
    }
  }


else if ($_GET['action'] == 'deco') {
  // Admin();
  deconnexion();
  }
}

else{
  Admin();
  viewIndex();
}
