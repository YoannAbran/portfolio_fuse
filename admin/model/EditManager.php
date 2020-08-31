<?php

class EditManager extends AdminDatabase
{

  public function viewimg($id){
    $conn = $this->dbConnect();
    $sqlimg = $conn->prepare("SELECT id_image, image, idprojet
                            FROM images
                            WHERE idprojet = $id ");
    $sqlimg ->execute();
    $imgs = $sqlimg->fetchAll();
    return $imgs;
  }

  public function edittext($id){
  $conn = $this->dbConnect();
    $sql = $conn->prepare("SELECT titre, description
                            FROM projet
                            WHERE id_projet= $id ");
    $sql->execute();
    $texts = $sql->fetchAll();
    return $texts;
  }

  public function deleteImg($idimg){
    $conn = dbConnect();
    $delimg = $conn-> prepare("DELETE FROM images WHERE id_image = $idimg");
    $delimg->execute();
    return $delimg;
  }

  public function editup($id, $titredit, $descredit){
    $conn = $this->dbConnect();
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

}
 ?>
