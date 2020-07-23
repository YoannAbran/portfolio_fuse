<?php
$id = $_GET['idel'];
include '../include/config.php';

// DELETE projet,images FROM projet
//         INNER JOIN
//     images ON projet.id_projet = images.idprojet
// WHERE
//     projet.id_projet= $id AND images.idprojet = $id

$del = "DELETE FROM projet WHERE id_projet = $id";
 $conn->exec($del);
  echo "Record deleted successfully";
header('Location: ../index.php');
exit;
?>
