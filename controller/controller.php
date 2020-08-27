<?php
  require("model/model.php");

function aboutControl(){
  $about = about();
  require("view/aboutView.php");
}
function contact(){
  sendMail();
  require("view/contactView.php");
}
function projects(){
  $allProjects = getAllProjects();
  require("view/projetsView.php");
}
function project(){
  if (isset($_GET['id']) && $_GET['id'] > 0) {
      $project = getProject($_GET['id']);
      foreach ($project as $row) {
      }
      require('view/projetView.php');
  }
  else {
      echo 'Erreur : aucun projet trouvé';
  }
}
function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
