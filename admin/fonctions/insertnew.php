<?php
include '../include/config.php';



//creation nouvel article/projet
if(!empty($_POST['titre'])&& !empty($_POST['description'])&& !empty($_POST['gallery'])){

$titre = $_POST['titre'];
$description = $_POST['description'];
$gallery = $_POST['gallery'];

try{
  if(isset($_POST['titre'])){
    $sql = $conn->prepare( "INSERT INTO projet (titre,description,gallery) VALUES ('$titre','$description','$gallery')");
    $sql->execute();
  echo "
            <script>
                alert('Record updated successfully!');
            </script>";

        $last_id = $conn->lastInsertId();
header("Location: ../projetest.php?id=".$last_id );
exit;
}
}
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$conn = null;

}

?>
