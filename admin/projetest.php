<?php
  include "include/headeradmin.php" ;
  include "include/headwhiteadmin.php";
  include "admin.php";
?>
<?php
$id = $_GET['id'];

if (isset($_POST['titreedit'])&& isset($_POST['descredit']) && isset($_POST['galleryedit'])) {
  $titredit = $_POST['titreedit'];
  $descredit = $_POST['descredit'];
  $galleryedit = $_POST['galleryedit'];
try {
$stmt = $conn->prepare("UPDATE projet SET titre = :titre, description = :desription, gallery = :gallery WHERE id_projet= $id ");
$stmt->bindParam(':titre',$titredit);
$stmt->bindParam(':desription',$descredit);
$stmt->bindParam(':gallery',$galleryedit);
$stmt->execute();
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
}
$sql = "SELECT titre, description, gallery FROM projet WHERE id_projet= $id ";
    foreach ($conn -> query($sql) as $row) {
}

?>

<div class="bodyblack text-light pt-4">



  <div class="container d-flex justify-content-center">
    <div class=" container d-flex justify-content-center bgabout">
    <form name="formedit" action ="" class="p-5 text-center text-dark" method="post" id="formedit">
    <textarea name="titreedit" id="titreedit" contenteditable="true" ><?php echo htmlspecialchars($row['titre']) ?></textarea>

    <textarea name="descredit" id="descredit" contenteditable="true" ><?php echo htmlspecialchars($row['description']) ?></textarea>

    <textarea name="galleryedit" id="galleryedit" contenteditable="true" ><?php echo htmlspecialchars($row['gallery']) ?></textarea>

      <input class="btn" type="submit" value="Submit">
      </form>

  </div>
  </div>
</div>

<script src="js/editor.js"></script>

<?php
  include "include/footerwhiteadmin.php";
  include "include/footeradmin.php";
  ?>
