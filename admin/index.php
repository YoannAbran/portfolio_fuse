<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
  if ($_GET['action'] == 'create') {
    require("view/createView.php");
  }

else if ($_GET['action'] == 'about') {
    about();
    aboutView();
  }
  
else if ($_GET['action'] == 'aboutView') {
    aboutView();
  }

else if ($_GET['action'] == 'edit') {
    edit();
  }

else if ($_GET['action'] == 'deleteimg') {
  if (isset($_GET['imgdel'])) {
  deleteimgControl();
}
else {echo"bad news";
    }
  }

else if ($_GET['action'] == 'delete') {
  if (isset($_POST['suppr'])) {
    if (isset($_GET['idel'])) {
    deleteControl();
  }
  else {echo"bad news";
}
  }
  else {echo"bad news";
}
}

else if ($_GET['action'] == 'insertnew') {
if (isset($_POST['submit'])) {
    create($_POST['titre'], $_POST['description']);
    }
  }
}

else{
  viewIndex();
}
