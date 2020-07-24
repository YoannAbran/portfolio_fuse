<?php
include "include/headwhite.php";
include "include/config.php";


try {
$sql = $conn->prepare("SELECT projet.titre, projet.description, projet.id_projet, images.id_image, images.image, images.idprojet
                        FROM projet
                        LEFT JOIN images ON projet.id_projet = images.idprojet
                        GROUP BY projet.id_projet
                      ");
$sql->execute();
$rows = $sql->fetchAll();
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


foreach ($rows as $row) {
}
?>

<div class="bodyblack containeur-fluid d-flex flex-column align-items-center">


<div class="carousel d-flex flex-column justify-content-center pt-4 pb-3">
	<figure class="img-fluid">
		<a href="pokebomb.php"><img class="img-fluid" src="img/screenBomb.png" alt=""></a>
		<a href="int-barmy.php"><img class="img-fluid" src="img/screenBarmy1.png" alt=""></a>
		<a href="explofichier.php"><img class="img-fluid" src="img/screenExplo.png" alt=""></a>
		<a href="int-bislite.php"><img class="img-fluid" src="img/screenBislite1.png" alt=""></a>
	</figure>
	<nav class = "d-flex justify-content-center">
		<button class="nav prev">Prev</button>
		<button class="nav next">Next</button>
	</nav>
</div>

<div class=" container card-deck  row-cols-1 row-cols-sm-2  row-cols-md-3 row-cols-lg-4 " >


<?php

  foreach ($rows as $row){
if (!empty($row['image'])){

  echo "	<div class='col mb-4'>";
  echo "<div class='card shadow-sm bgcard text-dark' >";
  	echo "<img src='".$row['image']."' class='card-img-top' alt='...'>";
  	echo "<div class='card-body d-flex flex-column justify-content-between'>";
  		echo "<h5 class='card-title'>".$row['titre']."</h5>";
  		echo "<a href='projet-".$row['id_projet'].".html' class='btn'>GO !!</a>";

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
      echo "<a href='projet-".$row['id_projet'].".html' class='btn'>GO !!</a>";

    echo "</div>
  </div>
  </div>";
}
}
	 ?>


</div>
</div>

<script src="js/projet-carou.js"></script>

<?php
include "include/footerwhite.php";
?>
