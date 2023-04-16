<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "./config/pdo.php";

$title = "Paramètres";
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
              </div>

            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Modifier les informations</h6>
                <form action="" method="post" enctype="multipart/form-data">
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  
                <div class="col-6 mb-3">
                    <h6>Prénom</h6>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset(
                        $_POST["firstname"]
                    )
                        ? $_POST["firstname"]
                        : ""; ?>" required> <br>
                </div>
                <div class="col-6 mb-3">
                    <h6>Nom</h6>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset(
                        $_POST["lastname"]
                    )
                        ? $_POST["lastname"]
                        : ""; ?>" required><br>
                </div>

                <div class="col-6 mb-3">
                    <h6>Adresse e-mail</h6>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo isset(
                        $_POST["email"]
                    )
                        ? $_POST["email"]
                        : ""; ?>" required>
                </div>
                <div class="col-6 mb-3">
                    <h6>Téléphone</h6>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo isset(
                        $_POST["phone"]
                    )
                        ? $_POST["phone"]
                        : ""; ?>">
                </div>
                <div class="col-6 mb-3">
                    <h6>Date de naissance</h6>
                    <input type="date" name="birthdate" id="birthdate" class="form-control" value="<?php echo isset(
                        $_POST["birthdate"]
                    )
                        ? $_POST["birthdate"]
                        : ""; ?>" required>
                </div>
                <div class="col-6 mb-3">
                    <h6>Pays</h6>
                    <input type="text" name="country" id="country" class="form-control" value="<?php echo isset(
                        $_POST["country"]
                    )
                        ? $_POST["country"]
                        : ""; ?>">
                </div>

                <button type="submit" name='save' class="btn btn-primary btn-warning">Enregistrer</button>

                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>