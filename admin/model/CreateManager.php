<?php
class CreateManager
{
  public function addnew($titre, $description){
      $conn = $this->dbConnect();
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
