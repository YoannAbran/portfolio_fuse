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
$sql = $conn->prepare("SELECT projet.titre, projet.description, images.id_image, images.image, images.idprojet
                        FROM projet
                        INNER JOIN images ON projet.id_projet = images.idprojet
                        WHERE projet.id_projet= $id AND images.idprojet = $id ");
$sql->execute();
$row = $sql->fetchAll();
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
