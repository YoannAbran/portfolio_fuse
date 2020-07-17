<?php
include "include/header.php";
include "include/headwhite.php";
?>

<div class="bodyblack justify-content-center text-light">
  <div class="d-flex justify-content-center">
    <div id="bgabout"class="container d-flex row">
      <div class="container d-flex flex-column align-items-center p-4 col-lg-6 col-xs">
        <div class="p-4"><img src="img/article.jpg" alt="" style="width= "80px" height ="80px""></div>
          <p class="p-4 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

          <div class="container d-flex flex-column align-items-center p-4 col-lg-6 col-xs">
            <form id = "mailform" class="form-row" action="" method="post">
              <div class="p-2">
                <label class="col" for="">Nom</label>
                <input class="col" type = "text">
                <label class="col" for="">Email</label>
                <input class="col" type = "email">
              </div>
              <div class="p-2">
                <textarea class="col" rows="4" cols="60" name="comment" form="mailform">Entrer votre commentaire ...</textarea>
                </div>
                <div class="p-2">
                  <button type="submit" class="col btn ">Envoyer</button>
                </div>
            </form>
          </div>

      </div>
    </div>
    <div class="d-flex justify-content-center">
    <div id="bgcontact" class="container d-flex justify-content-center row">
      <div class="d-flex flex-column align-items-center justify-content-center col-lg-6 col-xs ">
        <p>Coordonnées</p>
        <p class = "m-0">Email : yoXXXX@XXXXX.fr</p>
        <p class = "m-0">Mobile : 06-XX-XX-XX-XX</p>
      </div>
      <div class="d-flex justify-content-center align-items-center col-lg-6 col-xs ">
        <p class="p-2">Réseaux sociaux</p>
        <div><img src="img/github.png" class=" rounded-lg img-fluid" alt=""></div>
        <div><img src="img/linkdin.png" class=" rounded-lg img-fluid" alt=""></div>
      </div>
    </div>
  </div>
  </div>


<?php
include "include/footerwhite.php";
include "include/footer.php";
 ?>
