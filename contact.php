<?php

include "include/headwhite.php";
include "form_valid.php";
?>
<div class="bodyblack container-fluid">


  <div class="container d-flex flex-column align-items-center text-light p-4 col-lg-6 col-xs">
    <form class="form-row d-flex flex-column align-items-center" action="" method="POST">

      <div class="p-2">
        <label class="col" for="nom">Nom</label>
        <input id="nom" class="col" type = "text" name="nom" required pattern="^[A-Za-z '-]+$" maxlength="25">

      </div>

      <div class="p-2">
        <label class="col" for="email">Email</label>
        <input id="email" class="col" type = "email" name="email" required pattern="^[A-Za-z0-9._%-]+@{1}[A-Za-z0-9.-]+\.{1}[A-Za-z]{2,6}$">
      </div>

      <div class="p-2">
        <textarea id="message" class="col" rows="4" cols="60" name="message" required>Entrer votre commentaire ...</textarea>
        </div>

        <div class="p-2">
          <button type="submit" class=" btn ">Envoyer</button>
        </div>
    </form>
  </div>
</div>
<?php
include "include/footerwhite.php";
?>
