<?php
class AboutAdminManager
{
  public function aboutup($descriptionedit,$coordedit,$image){
    $conn = $this->dbConnect();
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

  public function aboutText(){
  $conn = $this->dbConnect();
  $sql = $conn->prepare("SELECT photo, description, coordonnee FROM about ");
  $sql->execute();
  $aboutText = $sql->fetch();
  return $aboutText;
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
