<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'contact') {
      contact();
    }
    if ($_GET['action'] == 'projets') {
      projects();
    }
    if ($_GET['action'] == 'projet') {
      project();
    }
    }

else {
  include "view/indexView.php";
}
