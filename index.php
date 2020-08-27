<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'about') {
      headwhite();
      aboutControl();
    }
    if ($_GET['action'] == 'contact') {
      headwhite();
      contact();
    }
    if ($_GET['action'] == 'projets') {
      headwhite();
      projects();
    }
    if ($_GET['action'] == 'projet') {
      headwhite();
      project();
    }
    }



else {
  headblack();
  include "view/indexView.php";
  include "view/footerblackView.php";
}
