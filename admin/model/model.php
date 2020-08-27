<?php

function selectAll(){
  $conn = dbConnect();
  $sql = $conn->prepare("SELECT *
                          FROM projet
                          ");
  $sql->execute();
  $rows = $sql->fetchAll();
  return $rows;
}

function dropProject(){
  $conn = dbConnect();
  $sql = $conn->prepare("SELECT id_projet, titre FROM projet ");
  $sql->execute();
  $dropProject = $sql->fetchAll();
  return $dropProject;
}

function aboutup(){
  $conn = dbConnect();
  $filename = $_FILES['photo']['name'];
  // Location
  $target_file = '../img/'.$filename;
  // file extension
  $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
  $file_extension = strtolower($file_extension);
  // Valid image extension
  $valid_extension = array("png","jpeg","jpg","PNG");
  if(in_array($file_extension, $valid_extension)){
     // Upload file
     if(move_uploaded_file($_FILES['photo']['tmp_name'],$target_file)){
$aboutup = $conn->prepare("UPDATE about SET photo = :photo, description = :desription, coordonnee = :coordonnee");
$aboutup->bindParam(':photo',$target_file);
$aboutup->bindParam(':desription',$descriptionedit);
$aboutup->bindParam(':coordonnee',$coordedit);
$aboutup->execute();
}
}
return $aboutimg;
}

function aboutText(){
$conn = dbConnect();
$sql = $conn->prepare("SELECT photo, description, coordonnee FROM about ");
$sql->execute();
$aboutText = $sql->fetch();
return $aboutText;
}

function delete($id){

  $conn = dbConnect();
  $del = prepare("DELETE FROM projet WHERE id_projet = $id");
  $conn->execute($del);
}

function deleteImg($idimg){
  $conn = dbConnect();
  $delimg = $conn-> prepare("DELETE FROM images WHERE id_image = $idimg");
  $delimg->execute();
}

function editup($id, $titredit, $descredit){
  $conn = dbConnect();
  $edit = $conn->prepare("UPDATE projet SET titre = :titre, description = :desription WHERE id_projet= $id ");
  $edit->bindParam(':titre',$titredit);
  $edit->bindParam(':desription',$descredit);
  $edit->execute();
  return $edit;
}

function viewimg($id){
  $conn = dbConnect();
  $sqlimg = $conn->prepare("SELECT id_image, image, idprojet
                          FROM images
                          WHERE idprojet = $id ");
  $sqlimg ->execute();
  $imgs = $sqlimg->fetchAll();
  return $imgs;
}

function edittext($id){
$conn = dbConnect();
  $sql = $conn->prepare("SELECT titre, description
                          FROM projet
                          WHERE id_projet= $id ");
  $sql->execute();
  $texts = $sql->fetchAll();
  return $texts;
}

function addimg(){
    $conn = dbConnect();
    $countfiles = count($_FILES['files']['name']);
   // Prepared statement
    $query = "INSERT INTO images (name,image,idprojet) VALUES(?,?,?)";
    $addimg = $conn->prepare($query);
   // Loop all files
    for($i=0;$i<$countfiles;$i++){
     // File name
     $filename = $_FILES['files']['name'][$i];
     // Location
     $target_file = 'img/'.$filename;
     // file extension
     $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
     $file_extension = strtolower($file_extension);
     // Valid image extension
     $valid_extension = array("png","jpeg","jpg","PNG");

     if(in_array($file_extension, $valid_extension)){
        // Upload file
        if(move_uploaded_file($_FILES['images']['tmp_name'][$i],'../../'.$target_file)){
           // Execute query
 	  $addimg->execute(array($filename,$target_file,$id));
  }
}
    return $addimg;
}
}
function insertnew($titre,$descrition){
  $conn = dbConnect();
  $add = $conn->prepare( "INSERT INTO projet (titre,description) VALUES (:titre,:description)");
  $add->execute(array(
              ':titre' => $titre,
              ':description' => $description,
            ));

$last_id = $conn->lastInsertId();
return $add;
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
