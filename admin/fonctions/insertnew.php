<?php
include '../include/config.php';



if(isset($_POST['submit'])){

  extract($_POST);


    $sql = $conn->prepare( "INSERT INTO projet (titre,description) VALUES (:titre,:description)");
    $sql->execute(array(
                ':titre' => $titre,
                ':description' => $description,
              ));

  $last_id = $conn->lastInsertId();

  $countfiles = count($_FILES['files']['name']);
   // Prepared statement
   $query = "INSERT INTO images (name,image,idprojet) VALUES(?,?,?)";


   $statement = $conn->prepare($query);

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
        if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'../../'.$target_file)){

           // Execute query
 	  $statement->execute(array($filename,$target_file,$last_id));

        }
     }

   }
   echo "File upload successfully";
 }
 header("Location: ../projetest.php?id=".$last_id );
 exit;
?>
