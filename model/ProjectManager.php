<?php

class ProjectManager extends Database
{

  public function getAllProjects(){
    $conn = $this->dbConnect();
    $sql = $conn->prepare("SELECT projet.titre, projet.description, projet.id_projet, images.id_image, images.image, images.idprojet
                            FROM projet
                            LEFT JOIN images ON projet.id_projet = images.idprojet
                            GROUP BY projet.id_projet
                          ");
    $sql->execute();
    $allProjects = $sql->fetchAll();
    return $allProjects;
  }

  public function getProject($id){
    $conn = $this->dbConnect();
    $sql = $conn->prepare("SELECT projet.titre, projet.description, images.id_image, images.image, images.idprojet
                            FROM projet
                            LEFT JOIN images ON projet.id_projet = images.idprojet
                            WHERE projet.id_projet= $id ");
    $sql->execute(array($id));
    $project = $sql->fetchAll();
    return $project;
  }

  function dropProject(){
    $conn = $this->dbConnect();
    $sql = $conn->prepare("SELECT id_projet, titre FROM projet ");
    $sql->execute();
    $dropProject = $sql->fetchAll();
    return $dropProject;
  }

}
 ?>
