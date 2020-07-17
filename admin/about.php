<?php
  include "include/headeradmin.php";
  include "include/headwhiteadmin.php";
  include "admin.php";

if (isset($_POST['photoedit'])&& isset($_POST['descriptionedit']) && isset($_POST['coordedit'])) {
  $photoedit = htmlspecialchars($_POST['photoedit']);
  $descriptionedit = htmlspecialchars($_POST['descriptionedit']);
  $coordedit = htmlspecialchars($_POST['coordedit']);
try {
$stmt = $conn->prepare("UPDATE about SET photo = :photo, description = :desription, coordonnee = :coordonnee");
$stmt->bindParam(':photo',$photoedit);
$stmt->bindParam(':desription',$descriptionedit);
$stmt->bindParam(':coordonnee',$coordedit);
$stmt->execute();
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
}
$sql = "SELECT photo, description, coordonnee FROM about ";
    foreach ($conn -> query($sql) as $row) {
}
?>
<div class="bodyblack justify-content-center text-light">
  <div class="d-flex justify-content-center ">
    <div class=" container d-flex row bgabout">
      <div class="container d-flex flex-column align-items-center p-4 col-lg-6 col-xs">

<form id="aboutedit" class="text-center text-dark" action="" method="post">

  <textarea class="" name="photoedit" contenteditable="true"><?php echo htmlspecialchars_decode ($row['photo']) ?></textarea>

  <textarea class="" name="descriptionedit" contenteditable="true"><?php htmlspecialchars_decode (echo $row['description']) ?></textarea>

  <textarea name="coordedit" class = "" contenteditable="true"><?php echo htmlspecialchars_decode ($row['coordonnee']) ?></textarea>

  <input class="btn" type="submit" value="Submit" >
</form>

      </div>
    </div>
  </div>
</div>
  <script>
  CKEDITOR.disableAutoInline = true;
  CKEDITOR.inline( 'photoedit' );
  CKEDITOR.instances.photoedit.updateElement();
  CKEDITOR.inline( 'descriptionedit' );
  CKEDITOR.instances.descriptionedit.updateElement();
  CKEDITOR.inline( 'coordedit' );
  CKEDITOR.instances.coordedit.updateElement();
</script>


<?php
include "include/footerwhiteadmin.php";
include "include/footeradmin.php";
?>
