<?php
include "include/config.php";

    $nom = valid_donnees($_POST["nom"]);
    $email = valid_donnees($_POST["email"]);
    $message = valid_donnees($_POST["message"]);

    function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
}
        if (!empty($nom) && strlen($nom) <= 20 && preg_match("#^[A-Za-z '-]+$#",$nom) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($message)){

$to = "y.abran@codeur.online";
$headers = 'From:'.$nom.'<'.$email.'>';1

$subject = "test";

            if (mail($to,$subject,$message,$headers)) {
              echo "Email envoyé avec succès à $to ...";
            }
            else {
                echo "Échec de l'envoi de l'email...";
              }
                //   try {
                //
                // $form = "INSERT INTO email (nom, email, message) VALUES ('$nom', '$email', '$message')";
                // $conn->exec($form);
                //
                // echo "message envoyé";
                //   }
                //   catch(PDOException $e) {
                //     echo "Connection failed: " . $e->getMessage();
                //   }

                }
        else {
          // header('Location : contact.php');
          echo "erreur";
          exit;
        }
?>
