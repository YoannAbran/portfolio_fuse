<?php
include "include/headwhite.php";
include "include/config.php";

$id = $_GET['id'];
try {
$sql = $conn->prepare("SELECT projet.titre, projet.description, images.id_image, images.image, images.idprojet
                        FROM projet
                        LEFT JOIN images ON projet.id_projet = images.idprojet
                        WHERE projet.id_projet= $id ");
$sql->execute();
$row = $sql->fetchAll();
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
foreach ($row as $rowedit) {
}
?>
<div class="bodyblack text-light pt-4">
  <div class="container text-center">
    <h1 class="text-center"><?php echo $rowedit['titre']?></h1>
    <div class="text-center">
    <?php echo  $rowedit['description']?>
  </div>
    <div class="container d-flex flex-row">

      <?php
      foreach ($row as $rowedit) {

    echo "<img src='".$rowedit['image']."' alt=''>";
}?>
    </div>
  </div>
</div>

<?php
include "include/footerwhite.php";

 ?>
