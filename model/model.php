<?php
function dropProject(){
  $conn = dbConnect();
  $sql = $conn->prepare("SELECT id_projet, titre FROM projet ");
  $sql->execute();
  $dropProject = $sql->fetchAll();
  return $dropProject;
}

function about(){
  $conn = dbConnect();
  $sql = $conn->prepare("SELECT photo, description, coordonnee FROM about ");
  $sql->execute();
  $about = $sql->fetch();
  return $about;
}
function getProject($id){
    $conn = dbConnect();
  $sql = $conn->prepare("SELECT projet.titre, projet.description, images.id_image, images.image, images.idprojet
                          FROM projet
                          LEFT JOIN images ON projet.id_projet = images.idprojet
                          WHERE projet.id_projet= $id ");
  $sql->execute(array($id));
  $project = $sql->fetchAll();
  return $project;
}
function getAllProjects(){
  $conn = dbConnect();
  $sql = $conn->prepare("SELECT projet.titre, projet.description, projet.id_projet, images.id_image, images.image, images.idprojet
                          FROM projet
                          LEFT JOIN images ON projet.id_projet = images.idprojet
                          GROUP BY projet.id_projet
                        ");
  $sql->execute();
  $allProjects = $sql->fetchAll();
  return $allProjects;
}
function dbConnect()
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