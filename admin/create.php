<?php
  include "include/headwhiteadmin.php";
?>
<div class="bodyblack text-center">

<form  class="text-light" method='post' action='testcreate.php' enctype='multipart/form-data'>
    <h1 class="gold p-4">Titre</h1>
        <input type="text" name="titre" value="titre">

        <h1 class="gold p-4">description</h1>
            <textarea name="description" id="description">
              Description
            </textarea>


<h1 class="gold p-4">gallery</h1>
<input type='file' name='files[]' multiple />
<button  class="m-4" type="submit" value="Submit" name="submit">Submit</button>

</form>
</div>

<?php
  include "include/footerwhiteadmin.php";
 ?>
