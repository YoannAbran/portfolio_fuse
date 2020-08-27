<?php
  require("../model/model.php");

function aboutEdit(){
  if (isset($_POST['descriptionedit']) && isset($_POST['coordedit'])) {
    extract($_POST);
    $aboutup = aboutup();
  }
}

function edit(){
  if (isset($_GET['id']) && $_GET['id'] > 0) {
    if(isset($_POST['titreedit'] && $_POST['descredit'])){
      $edit = editup($_GET['id'],$_POST['titreedit'],$_POST['descredit']);
    }
    if(isset($_POST['editimg'])){
      $addimg = addimg();
    }
  }
}
