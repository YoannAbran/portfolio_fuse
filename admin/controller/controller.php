<?php
  require_once("model/EditManager.php");
  require_once("model/CreateManager.php");
  require_once("model/AboutAdminManager.php");
  require_once("model/IndexManager.php");
  require_once("model/AdminManager.php");

  function about(){
  if (isset($_POST['descriptionedit']) && isset($_POST['coordedit'])) {
    $aboutAdminManager= new AboutAdminManager();
    $aboutup = $aboutAdminManager->aboutup($_POST['descriptionedit'],$_POST['coordedit'],$_POST['photo']);

  }
  }

  function aboutView(){
    $aboutAdminManager= new AboutAdminManager();
    $aboutText = $aboutAdminManager->aboutText();
    require("view/aboutView.php");
  }

  function edit(){
    if (isset($_GET['id']) && $_GET['id'] > 0) {
      $editManager = new EditManager();
      if(isset($_POST['edit'])){
        $edit = $editManager->editup($_GET['id'],$_POST['titreedit'],$_POST['descredit']);
      }
      $imgs = $editManager->viewimg($_GET['id']);
      $texts = $editManager->edittext($_GET['id']);
      require('view/editView.php');
    }
  }

  function deleteimgControl(){
      if (isset($_GET['imgdel']) && $_GET['imgdel'] > 0) {
        $editManager = new EditManager();
        $delimg = $editManager->deleteImg($_GET['imgdel']);
        $id=$_GET['id'];
        header('Location: index.php?action=edit&id=' . $id);
      }
  }

  function create($titre, $description){
      $editManager = new CreateManager;
      $addnew = $editManager->addnew($titre, $description);
      header('Location: index.php');
      exit;
  }

  function viewIndex(){
    $indexManager = new IndexManager;
    $rows = $indexManager->selectAll();
    require("view/indexView.php");
  }

  function deleteControl(){
      if (isset($_GET['idel'])) {
        $indexManager = new IndexManager;
        $del = $indexManager->delete($_GET['idel']);
      }
      header('Location: index.php');
      exit;
    }
    function Admin(){
      $adminManager = new AdminManager;
      $admin = $adminManager-> isAdmin();
    }
    function loginConnexion(){
      $adminManager = new AdminManager;
      $login = $adminManager->loginCO();
    }
    function deconnexion(){
      $adminManager = new AdminManager;
      $deco = $adminManager->deco();
    }
