<?php
  ob_start();

  ?>
  <div class="bodyblack justify-content-center text-light">
    <div class="d-flex justify-content-center ">
      <div class=" container d-flex row bgabout">
        <div class="container d-flex flex-column align-items-center p-4 col-lg-6 col-xs">



  <img src="<?php echo $aboutText['photo'] ?>" alt="">
    <form id="aboutedit" class="text-center text-dark" action="index.php?action=about"  method="post" enctype='multipart/form-data'>
      <div>
        <input type='file' name='newphoto' />
        <input type="hidden" name="photo" value='<?php echo "".$aboutText['photo']."" ?>'>
      </div>

    <div><textarea class="p-2" name="descriptionedit" rows="8" cols="100"><?php echo htmlspecialchars($aboutText['description']) ?></textarea></div>

    <div><textarea name="coordedit" class = "p-2" rows="8" cols="100"><?php echo htmlspecialchars($aboutText['coordonnee']) ?></textarea></div>

    <div><input class="btn" type="submit" value="Submit" ></div>
  </form>

  <div class="">
    <?php echo $aboutText['coordonnee'] ?>
  </div>

        </div>
      </div>
    </div>
  </div>

<?php
$content = ob_get_clean();
 require('view/template.php');
?>
