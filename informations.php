<?php
if (!isset($_SESSION)) {
    session_start();
}

include "functions/isTrueFalse.php";
require_once "./config/pdo.php";

$email = $_SESSION["email"];
$stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");

// 2 - Exécute ma requête
$result = $stmt->execute(["email" => $email]);
$user = $stmt->fetch();

$title = "Profil";
include "layout/header.php";
include "layout/navbar.php";
?>
<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 bg-warning text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="uploads/<?= $user["profile_image"] ??
                  "IMG-Default.jpg" ?>"
                alt="Avatar" class="img-fluid my-5" style="border-radius: 1rem; width: 100px;" />
              <h5><?= $user["firstname"] . " " . $user["lastname"] ?></h5>
              <br>
              <a href="settings.php" style="color: inherit;"><i class="fa fa-edit mb-5" style="font-size: 35px;"></i></a>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Informations</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Adresse e-mail</h6>
                    <p class="text-muted"><?= $user["email"] ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Téléphone</h6>
                    <p class="text-muted"><?= $user["phone"] ??
                        "Non indiqué" ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Date de naissance</h6>
                    <p class="text-muted"><?= $user["birthdate"] ??
                        "Non indiqué" ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Pays</h6>
                    <p class="text-muted"><?= $user["country"] ??
                        "Non indiqué" ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Compte créé le</h6>
                    <p class="text-muted"><?= $user["created_at"] ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Compte certifié</h6>
                    <p class="text-muted"><?= isTrueFalse(
                        $user["is_certified"]
                    ) ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>