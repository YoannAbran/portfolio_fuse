<?php
  ob_start();
  foreach ($texts as $text) {
  }
  $id=$_GET['id'];
?>

<div class="bodyblack text-light pt-4">

  <div class="container d-flex justify-content-center">

  <div class=" container d-flex flex-column align-items-center bgabout">

    <form  action ="index.php?action=edit&id=<?php echo $id ?>" class="p-5 text-center text-dark" method="post" enctype='multipart/form-data' id="formedit">
      <div class="p-2">
        <input type="text" name="titreedit" value="<?php echo htmlspecialchars($text['titre']) ?>" size="50">
      </div>
      <div class="p-2">
        <textarea name="descredit" id="descredit" rows="8" cols="100" ><?php echo  htmlspecialchars($text['description']) ?></textarea>
      </div>

      <input type='file' name='files[]' multiple />
      <div class="p-2">
        <input class="btn" type="submit" name="edit" value="Submit">
      </div>
        </form>

      <div class="d-flex row">

<?php

foreach ($imgs as $img) {


  echo"<div class='form-check d-flex flex-column align-items-center col-3'>
  <img class='py-3 col' src='../".$img['image']."' alt=''>
  <form action ='index.php?action=deleteimg&imgdel=".$img['id_image']."&id=".$id."' method='post' name='delimg' onsubmit='return submitResult();'><input type='submit' value='Supprimer' name='delimg'></form>

</div>";

}

 ?>


</div>

<!-- <div class="">
  <form action="<?php echo "index.php?action=edit&id=".$id.""; ?>"  method="post" enctype='multipart/form-data'>
    <input type='file' name='files[]' multiple />
    <button  class="m-4" type="submit" value="Submit" name="editimg">modif</button>
  </form>

</div> -->



  </div>
  </div>
</div>

<?php
$content = ob_get_clean();
 require('view/template.php');
  ?>
