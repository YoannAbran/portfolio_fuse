<?php $title = $row['titre'];
$colorHead='headwhite';
$colorTransiD='transidownwhite';
$colorTransiU='transiupwhite';
$colorFooter='footerwhite';
$navColor='navbar-light';
$dropProject = dropProject(); ?>

<?php ob_start(); ?>
<div class="bodyblack text-light pt-4">
  <div class="container text-center">
    <h1 class="text-center"><?php echo $row['titre']?></h1>
    <div class="text-center">
    <?php echo  $row['description']?>
  </div>
    <div class="container d-flex flex-row">

      <?php
      foreach ($project as $row) {

    echo "<img src='".$row['image']."' alt=''>";
}?>
    </div>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
