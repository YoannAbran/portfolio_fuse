<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
  if ($_GET['action'] == 'create') {
    create();
  }
  }
else if (isset($_GET['action'])) {
  if ($_GET['action'] == 'about') {
    about();
  }
}

else if (isset($_GET['action'])) {
  if ($_GET['action'] == 'edit') {
    edit();
  }
}
else if (isset($_GET['action'])) {
  if ($_GET['action'] == 'deleteimg') {
    deleteimgControl();
  }
}

else{
  viewIndex();
}
