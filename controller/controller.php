<?php
require_once("model/AboutManager.php");
require_once("model/ProjectManager.php");
require_once("model/MailManager.php");

function aboutControl(){
  $aboutManager = new AboutManager();
  $about = $aboutManager->about();
  require("view/aboutView.php");
}

function projects(){
  $projectManager = new ProjectManager;
  $allProjects= $projectManager->getAllProjects();
  require("view/projetsView.php");
}

function project(){
  if (isset($_GET['id']) && $_GET['id'] > 0){
    $projectManager = new ProjectManager;
    $project = $projectManager->getProject($_GET['id']);
    foreach ($project as $row) {
    }
    require('view/projetView.php');
  }
  else {
      echo 'Erreur : aucun projet trouvé';
  }
}
function contact(){
  $mailManager = new MailManager();
  $contact = $mailManager->sendMail();
  require("view/contactView.php");
}

 ?>
