<?php


if (!isset($_POST["nom"]) && !isset($_POST["email"]) && !isset($_POST["message"])){
  echo "
  <div class='alert alert-alert container text-center' role='alert'>
    Veuillez remplir tous les champs
  </div>";
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
        function valid_donnees($donnees){
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
        }
?>
