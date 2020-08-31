<?php

class IndexManager extends AdminDatabase
{

  public function selectAll(){
    $conn = $this->dbConnect();
    $sql = $conn->prepare("SELECT *
                            FROM projet
                            ");
    $sql->execute();
    $rows = $sql->fetchAll();
    return $rows;
  }

  public function dropProject(){
    $conn = $this->dbConnect();
    $sql = $conn->prepare("SELECT id_projet, titre FROM projet ");
    $sql->execute();
    $dropProject = $sql->fetchAll();
    return $dropProject;
  }
  public function delete($id){
    $conn = $this->dbConnect();
    $sql = $conn-> prepare("DELETE FROM projet WHERE id_projet = $id");
    $del = $sql->execute();
    return $del;
  }

}

 ?>
