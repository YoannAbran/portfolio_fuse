<?php
class AdminManager
{

  public function login($user,$password){
  $conn = $this->dbConnect();
  session_start();

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
        echo "Welcome " . $_SESSION['authUser'];
        header('Location:index.php');
        exit;
    }
  else{
    echo "Get out you're not authorized";
  }
}

public function isAdmin(){
  session_start();
    if ($_SESSION['isAdmin']) {
        echo "Welcome " . $_SESSION['authUser'];

    }
    else {
        echo "Get out you're not authorized";
        header('Location: index.php?action=login');
        exit;
    }
  }

  public function loginCO(){
    if (isset($_POST["user"]) && isset($_POST["password"])){
    $this->login($_POST["user"],$_POST["password"]);
  }
  }

  public function deco(){
    session_start();

    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();

    // Suppression des cookies de connexion automatique
    setcookie('login', '');
    setcookie('pass_hache', '');

    header('Location: ../index.php');
    exit;
  }
  private function dbConnect()
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
}
