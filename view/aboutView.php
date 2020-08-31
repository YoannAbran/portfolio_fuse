<?php $title = 'About';
      $colorHead='headwhite';
      $colorTransiD='transidownwhite';
      $colorTransiU='transiupwhite';
      $colorFooter='footerwhite';
      $navColor='navbar-light';
      // $dropProject = dropProject();?>

<?php ob_start(); ?>
<div class="bodyblack justify-content-center text-light">
  <div class="d-flex justify-content-center">
    <div id="bgabout"class="container d-flex row">
      <div class="container d-flex flex-column align-items-center p-4 col-lg-6 col-xs">
        <div id='photo' class="p-4"><img src="<?php echo $about['photo'] ?>" alt=""></div>
          <p class="p-4 text-justify"><?php echo $about['description'] ?></p>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
    <div id="bgcontact" class="container d-flex justify-content-center row">
      <div class="d-flex flex-column align-items-center justify-content-center col-lg-6 col-xs ">
        <p>Coordonnées</p>
        <?php echo $about['coordonnee'] ?>
      </div>
      <div class="d-flex justify-content-center align-items-center col-lg-6 col-xs ">
        <p class="p-2">Réseaux sociaux</p>
        <div><img src="img/github.png" class=" rounded-lg img-fluid" alt=""></div>
        <div><img src="img/linkdin.png" class=" rounded-lg img-fluid" alt=""></div>
      </div>
    </div>
  </div>
  </div>
  <?php $content = ob_get_clean(); ?>
  <?php require('template.php'); ?>
