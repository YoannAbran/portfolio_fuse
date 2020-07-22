<?php
  include "include/headwhiteadmin.php";


  if (isset($_POST['descriptionedit']) && isset($_POST['coordedit'])) {

  extract($_POST);

    $filename = $_FILES['photo']['name'];
    // Location
    $target_file = 'img/'.$filename;
    // file extension
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    // Valid image extension
    $valid_extension = array("png","jpeg","jpg","PNG");
    if(in_array($file_extension, $valid_extension)){

       // Upload file
       if(move_uploaded_file($_FILES['photo']['tmp_name'],$target_file)){
       }
    }
  try {
  $stmt = $conn->prepare("UPDATE about SET photo = :photo, description = :desription, coordonnee = :coordonnee");
  $stmt->bindParam(':photo',$target_file);
  $stmt->bindParam(':desription',$descriptionedit);
  $stmt->bindParam(':coordonnee',$coordedit);
  $stmt->execute();
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  }
  $sql = $conn->prepare("SELECT photo, description, coordonnee FROM about ");
  $sql->execute();
  $row = $sql->fetch();
  ?>
  <div class="bodyblack justify-content-center text-light">
    <div class="d-flex justify-content-center ">
      <div class=" container d-flex row bgabout">
        <div class="container d-flex flex-column align-items-center p-4 col-lg-6 col-xs">



  <img src="<?php echo $row['photo'] ?>" alt="">
    <form id="aboutedit" class="text-center text-dark" action=""  method="post" enctype='multipart/form-data'>
      <input type='file' name='photo' />

    <textarea class="" name="descriptionedit"><?php echo htmlspecialchars($row['description']) ?></textarea>

    <textarea name="coordedit" class = ""><?php echo htmlspecialchars($row['coordonnee']) ?></textarea>

    <input class="btn" type="submit" value="Submit" >
  </form>

  <div class="">
    <?php echo $row['coordonnee'] ?>
  </div>

        </div>
      </div>
    </div>
  </div>
  
<?php
include "include/footerwhiteadmin.php";
?>
