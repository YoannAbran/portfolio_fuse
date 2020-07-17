<?php

require_once ('include/config.php');

session_start();

if (isset($_POST["user"]) && isset($_POST["password"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];

    $sql = "SELECT password, id FROM admin WHERE user = :user";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':user', $user);
    $stmt->execute();
    $result = $stmt->fetch();
    $isValid = password_verify($password, $result[0]);

    if ($isValid) {
        $_SESSION['isAdmin'] = true;
        $_SESSION['authUser'] = $user;
        $_SESSION['id'] = $result[1];
        header('Location: fonctions/connexion.php');
        exit;
    }
}
?>

<form  method="POST">
  <input id='user' type="text" name="user" value="">
  <input id='password' type="password" name="password" value="">
  <input type="submit" name="" value="Submit">
</form>
