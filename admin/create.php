<?php
  include "include/headeradmin.php";
  include "include/headwhiteadmin.php";
  include "admin.php";
?>
<div class="bodyblack text-center">
  <form action ="fonctions/insertnew.php"  method="post">

    <h1 class="gold p-4">Titre</h1>
        <textarea name="titre" id="titre">
          Titre
        </textarea>

        <h1 class="gold p-4">description</h1>
            <textarea name="description" id="description">
              Description
            </textarea>

        <h1 class="gold p-4">gallery</h1>
            <textarea name="gallery" id="gallery">
              Image
            </textarea>

              <input class="m-4" type="submit" value="Submit">
  </form>
</div>



      <script>
        CKEDITOR.replace( 'titre' );
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'gallery' );
      </script>

<?php
  include "include/footerwhiteadmin.php";
  include "include/footeradmin.php";
 ?>
