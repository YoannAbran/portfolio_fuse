<?php

class AboutManager extends Database
{
  public function about(){
    $conn = $this->dbConnect();
    $sql = $conn->prepare("SELECT photo, description, coordonnee FROM about ");
    $sql->execute();
    $about = $sql->fetch();
    return $about;
  }
}

 ?>
