<?php
include "include/header.php";
include "include/headwhite.php";
include "include/config.php";

$id = $_GET['id'];
$sql = $conn->prepare("SELECT titre, description, gallery FROM projet WHERE id_projet= $id");
$sql->execute();
$row = $sql->fetch();
?>

<div class="bodyblack text-light pt-4">
  <div class="container text-center">
    <h1 class="text-center"><?php echo $row['titre']?></h1>
    <div class="text-center">
    <?php echo  $row['description']?>
  </div>
    <div class="container d-flex flex-row">
      <?php echo $row['gallery']?>
    </div>
  </div>
</div>

<?php
include "include/footerwhite.php";
include "include/footer.php";
 ?>
