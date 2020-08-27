<?php
  require("model/model.php");

function aboutControl(){
  if (isset($_POST['descriptionedit']) && isset($_POST['coordedit'])) {
    extract($_POST);
    $aboutup = aboutup();
}
$aboutText = aboutText();
require("view/aboutView.php");
}

function create(){

  if(isset($_POST['submit'])){
    $add = insertnew($_POST['submit']);
    $addimg = addimg();
}

  require("view/createView.php");

}

function edit(){
  if (isset($_GET['id']) && $_GET['id'] > 0) {
    if(isset($_POST['submit'])){
      $edit = editup($_GET['id'],$_POST['titreedit'],$_POST['descredit']);
    }
    if(isset($_POST['editimg'])){
      $addimg = addimg();
    }
    $imgs = viewimg($_GET['id']);
    $texts = edittext($_GET['id']);
    require('view/editView.php');
  }
}


function deleteControl(){
    if (isset($_GET['id']) && $_GET['id'] > 0) {
      $del = delete($_GET['id']);

    }
  }
  function deleteimgControl(){
    if (isset($_GET['idimg']) && $_GET['idimg'] > 0) {
      $delimg = deleteImg($_GET['idimg']);
      header('Location: index.php?action=edit&id=' . $id);
    }
}
function viewIndex(){
  $rows = selectAll();
  require("view/indexView.php");
}
