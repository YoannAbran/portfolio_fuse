<?php

include "include/header.php";
include "include/headblack.php";
?>
<div class="bodywhite container-fluid d-flex align-items-center justify-content-center " >


<div class=" container card-deck d-flex justify-content-around " >
<div class=" container row row-cols-1 row-cols-md-3">


  <div class="card shadow-sm bgcard text-dark" >
    <img src="img/screenBomb.png" class="card-img-top" alt="...">
    <div class="card-body d-flex flex-column justify-content-between">
      <h5 class=" card-title">Projets</h5>
      <p class=" card-text">Les différents projets que j'ai réalisé, des intégrations de maquette en CSS ou Bootstap en passant par un jeu en javascript...</p>
      <a href="projets.php" class="btn ">Allez voir les projets</a>
    </div>
  </div>

  <div class="card shadow-sm bgcard text-dark">
    <img src="img/article.jpg" class="card-img-top" alt="...">
    <div class="card-body d-flex flex-column justify-content-between">
      <h5 class="card-title">Articles</h5>
      <p class="card-text">Des articles intéressants.</p>
      <a href="#" class="btn">Allez voir les articles</a>
    </div>
  </div>

    <div class="card shadow-sm bgcard text-dark" >
      <img src="img/laptop.jpg" class="card-img-top" alt="...">
      <div class=" card-body d-flex flex-column justify-content-between">
        <h5 class="card-title">À propos de moi</h5>
        <p class="card-text">Quelques informations sur moi et mon parcours.</p>
        <a href="about.php" class="btn ">En apprendre plus sur moi</a>
      </div>
    </div>

  </div>
</div>
</div>

<?php
include "include/footerblack.php";
include "include/footer.php";


 ?>
