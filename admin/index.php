<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
  if ($_GET['action'] == 'create') {
    isAdmin();
    require("view/createView.php");
  }

else if ($_GET['action'] == 'login') {
  loginCO();
  require("view/loginView.php");
}

else if ($_GET['action'] == 'about') {
    isAdmin();
    about();
    aboutView();
  }

else if ($_GET['action'] == 'aboutView') {
    isAdmin();
    aboutView();
  }

else if ($_GET['action'] == 'edit') {
    isAdmin();
    edit();
  }

else if ($_GET['action'] == 'deleteimg') {
  if (isset($_GET['imgdel'])) {
    isAdmin();
    deleteimgControl();
  }
}

else if ($_GET['action'] == 'delete') {
  if (isset($_POST['suppr'])) {
    if (isset($_GET['idel'])) {
      isAdmin();
      deleteControl();
    }
  }
}

else if ($_GET['action'] == 'insertnew') {
if (isset($_POST['submit'])) {
    isAdmin();
    create($_POST['titre'], $_POST['description']);
    }
  }


else if ($_GET['action'] == 'deco') {
  isAdmin();
  deco();
  }
}
else{
  isAdmin();
  viewIndex();
}
