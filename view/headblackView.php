<header id="headblack" class="container-fluid ">
  <div class=" container d-flex justify-content-between">

    <div class="d-flex  col-6">

      <nav class="navbar navbar-expand-lg navbar-dark align-self-start pt-4 ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Projets
              </a>

              <div class="dropdown-menu text-light " aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item text-light" href="projets.php">Accueil Projets</a>

                <?php
                foreach ($dropProject as $row){
                  echo "<a class='dropdown-item text-light' href='projet-".$row['id_projet'].".html'>".$row['titre']."</a>";
                } ?>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="about.php">Moi</a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-light" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="d-flex flex-column text-light col-6">
      <h1 class="align-self-end p-4" id="logo">Y<a id="logoa" href="admin/login.php">A</a></h1>
      <h2 class=" d-none d-lg-block align-self-end pl-4"><span class="gold">Portfolio</span> Yoann Abran</h2>
    </div>
  </div>
 </header>
  <div id="transidownblack" class="d-flex align-self-end container-fluid"></div>
