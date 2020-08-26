<?php
include "controller/headwhite.php";

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $project = getProject($_GET['id']);
    foreach ($project as $row) {
    }
    require('view/projetView.php');
}
else {
    echo 'Erreur : aucun projet trouvé';
}
include "view/footerwhiteView.php";

 ?>
