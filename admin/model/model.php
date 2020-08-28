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

function aboutup($descriptionedit,$coordedit,$image){
  $conn = dbConnect();
  $sql = $conn->prepare("UPDATE about SET photo = :photo, description = :desription, coordonnee = :coordonnee");
  if (!empty($_FILES['newphoto']['name'])){
  $filename = $_FILES['newphoto']['name'];
  // Location
  $target_file = '../img/'.$filename;
  // file extension
  $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
  $file_extension = strtolower($file_extension);
  // Valid image extension
  $valid_extension = array("png","jpeg","jpg","PNG");
  if(in_array($file_extension, $valid_extension)){
     // Upload file
     if(move_uploaded_file($_FILES['newphoto']['tmp_name'],$target_file)){
     }
     }
   }
   else {
     $target_file = $image ;
   }

$sql->bindParam(':photo',$target_file);
$sql->bindParam(':desription',$descriptionedit);
$sql->bindParam(':coordonnee',$coordedit);
$aboutup = $sql->execute();

return $aboutup;

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
  $sql = $conn-> prepare("DELETE FROM projet WHERE id_projet = $id");
  $del = $sql->execute();
  return $del;
}

function deleteImg($idimg){
  $conn = dbConnect();
  $delimg = $conn-> prepare("DELETE FROM images WHERE id_image = $idimg");
  $delimg->execute();
  return $delimg;
}

function editup($id, $titredit, $descredit){
  $conn = dbConnect();
  $sql = $conn->prepare("UPDATE projet SET titre = :titre, description = :desription WHERE id_projet= $id ");
  $sql->bindParam(':titre',$titredit);
  $sql->bindParam(':desription',$descredit);
  $edit = $sql->execute();
  $countfiles = count($_FILES['files']['name']);
 // Prepared statement
  $sql = $conn -> prepare("INSERT INTO images (name,image,idprojet) VALUES(?,?,?)");

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
      if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'../'.$target_file)){
         // Execute query

  $edit=$sql->execute(array($filename,$target_file,$id));
}
}
  return $edit;
}
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

function addnew($titre, $description){
    $conn = dbConnect();
    $add = $conn->prepare( "INSERT INTO projet (titre, description) VALUES (:titre, :description)");
    $addnew = $add->execute(array(':titre'=>$titre, ':description'=>$description));
    $countfiles = count($_FILES['files']['name']);
   // Prepared statement
    $query = "INSERT INTO images (name,image,idprojet) VALUES(?,?,LAST_INSERT_ID())";
    $addnew = $conn->prepare($query);
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
        if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'../'.$target_file)){
           // Execute query
 	  $addnew->execute(array($filename,$target_file));
  }
}
return $addnew;
  }
}

function login($user,$password){
$conn = dbConnect();
session_start();

    $sql = "SELECT password, id FROM admin WHERE user = :user";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':user', $user);
    $stmt->execute();
    $result = $stmt->fetch();
    $isValid = password_verify($password, $result[0]);

    if ($isValid) {
        $_SESSION['isAdmin'] = true;
        $_SESSION['authUser'] = $user;
        $_SESSION['id'] = $result[1];
        echo "Welcome " . $_SESSION['authUser'];
        header('Location:index.php');
        exit;
    }
else{
  echo "Get out you're not authorized";
}
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
