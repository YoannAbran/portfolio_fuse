
<?php
  include "include/headeradmin.php";
  include "include/headwhiteadmin.php";
  include "admin.php";

    $sql = "SELECT id_projet, titre, description, gallery FROM projet ";
    foreach ($conn -> query($sql) as $row) {}
  ?>

  <table class="table table-bordered table-dark table-sm">
      <thead class="thead-light">
      <tr>
        <th class='px-5' scope="col">Titre</th>
        <th scope="col">Description</th>
        <th scope="col">Supprimer</th>
      </tr>
    </thead>
    <tbody>

        <?php  foreach ($conn -> query($sql) as $row) {

        echo "<tr><td class='px-5'><a class='text-light' href='projetest.php?id=".$row['id_projet']."'>".$row['titre']."</a></td>";
        echo "<td>".$row['description']."</td>";
        echo"<td><form action ='fonctions/delete.php?idel=".$row['id_projet']."' method='post' onsubmit='return submitResult();'><input type='submit' value='Supprimer'></form></td></tr>";
          } ?>

 </tbody>
</table>

<script>function submitResult() {
   if ( confirm("Etes vous sur de vouloir effacer ce fichier?") == false ) {
      return false ;
   } else {
      return true ;
   }
}
</script>
<?php
  include "include/footerwhiteadmin.php";
  include "include/footeradmin.php";
 ?>
