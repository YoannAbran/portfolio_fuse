<?php
function chargerClasse($classe)
{
  require "model/". $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}
spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

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
