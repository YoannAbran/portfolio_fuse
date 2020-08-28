<?php

 ob_start();
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

      <?php  foreach ($rows as $row){
      echo "<tr><td class='px-5'><a class='text-light' href='index.php?action=edit&id=".$row['id_projet']."'>".$row['titre']."</a></td>";
      echo "<td>".$row['description']."</td>";
      echo"<td><form action ='index.php?action=delete&idel=".$row['id_projet']."' method='post' onsubmit='return submitResult();'><input type='submit' name='suppr' value='Supprimer'></form></td></tr>";
        } ?>

  </tbody>
  </table>


<?php
$content = ob_get_clean();
require('view/template.php');
 ?>
