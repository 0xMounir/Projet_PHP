<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once "functions/redirect.php";

if (!isset($_SESSION["email"]) || !$_SESSION["email"]) {
    redirect("login.php");
    exit();
}
require_once "./config/pdo.php";
$email = $_SESSION["email"];

$stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
// 2 - Exécute ma requête
$result = $stmt->execute(["email" => $email]);
$user = $stmt->fetch();

$_SESSION["firstname"] = $firstname = $user["firstname"];
$_SESSION["firstname"] = $firstname = $user["firstname"];
$_SESSION["lastname"] = $lastname = $user["lastname"];
$_SESSION["profile_image"] = $lastname = $user["profile_image"];

$sql = "SELECT * FROM properties ORDER BY `created_at` DESC";
$requete = $pdo->query($sql);
$properties = $requete->fetchAll();

$title = "Parcourir";
include "layout/header.php";
include "layout/navbar.php";
?>

<section>
  <div class="container">
    <div class="row justify-content-md-center">
    <?php foreach ($properties as $propertie): ?>
    <div class="col-lg-3">
        <div class="py-5 mx-5">
        <div class="card" style="width: 18rem;">
  <img src="uploads/appartlyon7.jpg" class="card-img-top" alt="image du logement">
  <div class="card-body">
    <h5 class="card-title"><?= strip_tags($propertie["name"]) ?></h5>
    <p class="card-text"><?= strip_tags($propertie["description"]) ?></p>
    <p class="card-text"><small class="text-muted">Annonce publié le <?= strip_tags(
        $propertie["created_at"]
    ) ?></small></p>
    <a href="propertie.php?id=<?= $propertie[
        "id"
    ] ?>" class="btn btn-primary btn-warning">Visiter</a>
  </div>
</div>
</div>
</div>
    <?php endforeach; ?>
</section>
<?php include "layout/footer.php"; ?>
