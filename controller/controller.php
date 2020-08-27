<?php
  require("model/model.php");

  function headwhite(){
    $dropProject = dropProject();
    require("view/headwhiteView.php");
  }
  function headblack(){
    $dropProject = dropProject();
    require("view/headblackView.php");
  }

function aboutControl(){
  $about = about();
  require("view/aboutView.php");
  require("view/footerwhiteView.php");
}
function contact(){
  sendMail();

  require("view/contactView.php");
  require("view/footerwhiteView.php");
}
function projects(){
  $allProjects = getAllProjects();
  require("view/projetsView.php");
  require("view/footerwhiteView.php");
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
  require("view/footerwhiteView.php");
}
function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
