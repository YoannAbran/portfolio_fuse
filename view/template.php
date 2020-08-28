<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Yoann Abran">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  echo $title ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/3bd5358b64.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/projet-carou.css">
</head>
<body >
  <header id="<?php echo $colorHead ?>" class="container-fluid ">
    <div class=" container d-flex justify-content-between">

      <div class="d-flex  col-6">

        <nav class="navbar navbar-expand-lg <?php echo $navColor ?> align-self-start pt-4 ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle " href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Projets
                </a>

                <div class="dropdown-menu  " aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item  " href="index.php?action=projets">Accueil Projets</a>

                  <?php
                  foreach ($dropProject as $row){
                    echo "<a class='dropdown-item ' href='index.php?action=projet&id=".$row['id_projet']."'>".$row['titre']."</a>";
                  } ?>
                </div>
              </li>
              <li class="nav-item active">
                  <a class="nav-link " href="index.php?action=about">Moi</a>
              </li>
              <li class="nav-item active">
                 <a class="nav-link " href="index.php?action=contact">Contact</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="d-flex flex-column  col-6">
        <h1 class="align-self-end p-4" id="logo">Y<a id="logoa" href="admin/index.php?action=login">A</a></h1>
        <h2 class=" d-none d-lg-block align-self-end pl-4"><span class="gold">Portfolio</span> Yoann Abran</h2>
      </div>
    </div>
   </header>
    <div id="<?php echo $colorTransiD ?>" class="d-flex align-self-end container-fluid"></div>

  <?php echo $content ?>

  <div id="<?php echo $colorTransiU ?>" class="d-flex align-self-start container-fluid"></div>
  <div class=" d-flex justify-content-center" id="<?php echo $colorFooter?>">
    <div class="container d-flex justify-content-between row ">
    <div class="col">
    <h3 class = " gold m-0">Contact</h3>
    <p class = "m-0">Email : yoXXXX@XXXXX.fr</p>
    <p class = "m-0">Mobile : 06-XX-XX-XX-XX</p>
    <div class="d-flex justify-content-around col-4 h2">
    <a class = "gold m-0" href="#"><i class="fab fa-linkedin"></i></a>
    <a class = "gold m-0" href="#"><i class="fab fa-github"></i></a>
    </div>



    </div>

  <p class="align-self-end">crédits background carbone : <a class="" href="http://www.freepik.com">Designed by starline / Freepik</a></p>

  </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
