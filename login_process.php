<?php
if (!empty($_POST) && isset($_POST["email"]) && isset($_POST["password"])) {
    require_once "./config/pdo.php";

    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
    // 2 - Exécute ma requête
    $result = $stmt->execute(["email" => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["email"] = $user["email"];
        $_SESSION["firstname"] = $user["firstname"];

        if (isset($_SESSION["email"])) {
            header("Location: index.php");
        }
    } else {
        $email_err = true;
    }
}
?>
