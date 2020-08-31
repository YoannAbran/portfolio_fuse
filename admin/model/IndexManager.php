<?php
class IndexManager
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

  private function dbConnect()
  {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "testportfolio";

  try {
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  }
}

 ?>
