<div class="bodyblack text-light pt-4">
  <div class="container text-center">
    <h1 class="text-center"><?php echo $row['titre']?></h1>
    <div class="text-center">
    <?php echo  $row['description']?>
  </div>
    <div class="container d-flex flex-row">

      <?php
      foreach ($project as $row) {

    echo "<img src='../".$row['image']."' alt=''>";
}?>
    </div>
  </div>
</div>
