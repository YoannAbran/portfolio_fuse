<?php $title = 'Projets';
$colorHead='headwhite';
$colorTransiD='transidownwhite';
$colorTransiU='transiupwhite';
$colorFooter='footerwhite';
$navColor='navbar-light';
// $dropProject = dropProject(); ?>

<?php ob_start(); ?>
<div class="bodyblack containeur-fluid d-flex flex-column align-items-center">


<div class="carousel d-flex flex-column justify-content-center pt-4 pb-3">
	<figure class="img-fluid">
		<a href=""><img class="img-fluid" src="img/screenBarmy1.png" alt=""></a>
		<a href=""><img class="img-fluid" src="img/screenBomb.png" alt=""></a>
		<a href=""><img class="img-fluid" src="img/screenExplo.png" alt=""></a>
		<a href=""><img class="img-fluid" src="img/screenBislite1.png" alt=""></a>
	</figure>
	<nav class = "d-flex justify-content-center">
		<button class="nav prev">Prev</button>
		<button class="nav next">Next</button>
	</nav>
</div>

<div class=" container card-deck  row-cols-1 row-cols-sm-2  row-cols-md-3 row-cols-lg-4 " >


<?php

  foreach ($allProjects as $row){
if (!empty($row['image'])){

  echo "	<div class='col mb-4'>";
  echo "<div class='card shadow-sm bgcard text-dark' >";
  	echo "<img src='".$row['image']."' class='card-img-top' alt='...'>";
  	echo "<div class='card-body d-flex flex-column justify-content-between'>";
  		echo "<h5 class='card-title'>".$row['titre']."</h5>";
  		echo "<a href='index.php?action=projet&id=".$row['id_projet']."' class='btn'>GO !!</a>";

  	echo "</div>
  </div>
  </div>";

}

else{

  echo "	<div class='col mb-4'>";
  echo "<div class='card shadow-sm bgcard text-dark' >";
    echo "<img src='img/projet.jpg' class='card-img-top' alt='...'>";
    echo "<div class='card-body d-flex flex-column justify-content-between'>";
      echo "<h5 class='card-title'>".$row['titre']."</h5>";
      echo "<a href='index.php?action=projet&id=".$row['id_projet']."' class='btn'>GO !!</a>";

    echo "</div>
  </div>
  </div>";
}
}
	 ?>


</div>
</div>

<script src="js/projet-carou.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
