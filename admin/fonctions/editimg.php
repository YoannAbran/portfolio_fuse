<?php
include "../include/config.php";

$id = $_GET['id'];

if(isset($_POST['editimg'])){

  $countfiles = count($_FILES['images']['name']);
   // Prepared statement
   $query = "INSERT INTO images (name,image,idprojet) VALUES(?,?,?)";


   $statement = $conn->prepare($query);

   // Loop all files
   for($i=0;$i<$countfiles;$i++){

     // File name
     $filename = $_FILES['images']['name'][$i];

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
 	  $statement->execute(array($filename,$target_file,$id));

        }
     }

   }
   echo "File upload successfully";
   header('Location: ../projetest.php?id='.$id.'');
   exit;
 }
