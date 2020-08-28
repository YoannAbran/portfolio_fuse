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
    if (isset($_GET['idel'])) {
      $del = delete($_GET['idel']);
    }
    header('Location: index.php');
    exit;
  }
  function deleteimgControl(){
    if (isset($_GET['imgdel']) && $_GET['imgdel'] > 0) {
      $delimg = deleteImg($_GET['imgdel']);
      $id=$_GET['id'];
      header('Location: index.php?action=edit&id=' . $id);
    }
}

function create($titre, $description){
    $addnew = addnew($titre, $description);
    header('Location: index.php');
    exit;
}

function viewIndex(){
  $rows = selectAll();
  require("view/indexView.php");
}
