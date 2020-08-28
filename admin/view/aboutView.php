<?php
  ob_start();

  ?>
  <div class="bodyblack justify-content-center text-light">
    <div class="d-flex justify-content-center ">
      <div class=" container d-flex row bgabout">
        <div class="container d-flex flex-column align-items-center p-4 col-lg-6 col-xs">



  <img src="<?php echo $aboutText['photo'] ?>" alt="">
    <form id="aboutedit" class="text-center text-dark" action="index.php?action=about"  method="post" enctype='multipart/form-data'>
      <input type='file' name='newphoto' />
<input type="hidden" name="photo" value='<?php echo "".$aboutText['photo']."" ?>'>
    <textarea class="" name="descriptionedit"><?php echo htmlspecialchars($aboutText['description']) ?></textarea>

    <textarea name="coordedit" class = ""><?php echo htmlspecialchars($aboutText['coordonnee']) ?></textarea>

    <input class="btn" type="submit" value="Submit" >
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
