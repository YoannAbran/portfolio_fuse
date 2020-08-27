<?php
function dropProject(){
  $conn = dbConnect();
  $sql = $conn->prepare("SELECT id_projet, titre FROM projet ");
  $sql->execute();
  $dropProject = $sql->fetchAll();
  return $dropProject;
}

function about(){
  $conn = dbConnect();
  $sql = $conn->prepare("SELECT photo, description, coordonnee FROM about ");
  $sql->execute();
  $about = $sql->fetch();
  return $about;
}
function getProject($id){
    $conn = dbConnect();
  $sql = $conn->prepare("SELECT projet.titre, projet.description, images.id_image, images.image, images.idprojet
                          FROM projet
                          LEFT JOIN images ON projet.id_projet = images.idprojet
                          WHERE projet.id_projet= $id ");
  $sql->execute(array($id));
  $project = $sql->fetchAll();
  return $project;
}
function getAllProjects(){
  $conn = dbConnect();
  $sql = $conn->prepare("SELECT projet.titre, projet.description, projet.id_projet, images.id_image, images.image, images.idprojet
                          FROM projet
                          LEFT JOIN images ON projet.id_projet = images.idprojet
                          GROUP BY projet.id_projet
                        ");
  $sql->execute();
  $allProjects = $sql->fetchAll();
  return $allProjects;
}
function sendMail(){
  if (!isset($_POST["nom"]) && !isset($_POST["email"]) && !isset($_POST["message"])){
  }
  else {
    $nom = valid_donnees($_POST["nom"]);
    $email = valid_donnees($_POST["email"]);
    $message = valid_donnees($_POST["message"]);

          if (isset($nom) && strlen($nom) <= 20 && preg_match("#^[A-Za-z '-]+$#",$nom) && isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && isset($message)){

  $to = "y.abran@codeur.online";
  $headers = 'From:'.$nom.'<'.$email.'>';

  $subject = "Message de ".$nom."";

              if (mail($to,$subject,$message,$headers)) {
                echo "
                <div class='alert alert-primary container text-center' role='alert'>
                  Votre message a bien été envoyé !!
                </div>";

              }
              else {
                  echo "Échec de l'envoi de l'email...";
                }

                  }
          else {
            echo "erreur";

          }
  }

}

function dbConnect()
{
  $servername = "127.0.0.1";
  $username = "root";
  $password = "";
  $dbname = "testportfolio";

try {
  $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 return $conn;
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
}
