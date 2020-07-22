<?php
include "include/header.php";
include "include/headwhite.php";
include "include/config.php";

$sql = $conn->prepare("SELECT photo, description, coordonnee FROM about ");
$sql->execute();
$row = $sql->fetch();

?>

<div class="bodyblack justify-content-center text-light">
  <div class="d-flex justify-content-center">
    <div id="bgabout"class="container d-flex row">
      <div class="container d-flex flex-column align-items-center p-4 col-lg-6 col-xs">
        <div id='photo' class="p-4"><img src="<?php echo $row['photo'] ?>" alt=""></div>
          <p class="p-4 text-justify"><?php echo $row['description'] ?></p>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
    <div id="bgcontact" class="container d-flex justify-content-center row">
      <div class="d-flex flex-column align-items-center justify-content-center col-lg-6 col-xs ">
        <p>Coordonnées</p>
        <?php echo $row['coordonnee'] ?>
      </div>
      <div class="d-flex justify-content-center align-items-center col-lg-6 col-xs ">
        <p class="p-2">Réseaux sociaux</p>
        <div><img src="img/github.png" class=" rounded-lg img-fluid" alt=""></div>
        <div><img src="img/linkdin.png" class=" rounded-lg img-fluid" alt=""></div>
      </div>
    </div>
  </div>
  </div>


<?php
include "include/footerwhite.php";
include "include/footer.php";
 ?>
