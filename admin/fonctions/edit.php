<?php
$id = $_GET['id'];
if (isset($_POST['titreedit'])&& isset($_POST['descredit'])) {

  $titredit = $_POST['titreedit'];
  $descredit = $_POST['descredit'];

try {
$stmt = $conn->prepare("UPDATE projet SET titre = :titre, description = :desription WHERE id_projet= $id ");
$stmt->bindParam(':titre',$titredit);
$stmt->bindParam(':desription',$descredit);
$stmt->execute();
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
}

try {
$sql = $conn->prepare("SELECT id_image, image, idprojet
                        FROM images
                        WHERE idprojet = $id ");
$sql->execute();
$imgs = $sql->fetchAll();
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


  try {
  $sql = $conn->prepare("SELECT titre, description
                          FROM projet
                          WHERE id_projet= $id ");
  $sql->execute();
  $texts = $sql->fetchAll();
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

foreach ($imgs as $img) {
}
foreach ($texts as $text) {
}
