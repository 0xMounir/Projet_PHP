<?php
if (!isset($_SESSION)) {
    session_start();
}

include "register_process.php";
$title = "S'inscrire";
include "layout/header.php";
?> 
              <?php if (isset($_GET["error"])): ?>
                <p><?php echo $_GET["error"]; ?></p>
              <?php endif; ?>

              <?php if (isset($errMsg)) {
                  echo '<div style="color:#FF0000;text-align:center;font-size:17px;">' .
                      $errMsg .
                      "</div>";
              } ?>

              <section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center">
						<img src="assets/images/logo.png" alt="logo" class="img-fluid w-50">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4 text-center">S'inscrire</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off" enctype="multipart/form-data">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="firstname">Prénom <span class="text-danger">*</span></label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset(
                                        $_POST["firstname"]
                                    )
                                        ? $_POST["firstname"]
                                        : ""; ?>" required>
									<div class="invalid-feedback">Le prénom est obligatoire.</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="lastname">Nom <span class="text-danger">*</span></label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset(
                                        $_POST["lastname"]
                                    )
                                        ? $_POST["lastname"]
                                        : ""; ?>" required>
									<div class="invalid-feedback">Le prénom est obligatoire.</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Adresse e-mail <span class="text-danger">*</span></label>
									<input type="text" name="email" id="email" class="form-control" value="<?php echo isset(
             $_POST["email"]
         )
             ? $_POST["email"]
             : ""; ?>" required>
									<div class="invalid-feedback">L'email est obligatoire.</div>
								</div>

								<div class="mb-3">
                                    <i class="fa fa-eye-slash" id="togglePassword" onclick="ShowPassFunction()"></i>
									<label class="mb-2 text-muted" for="password">Mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="hideShowPassword" class="form-control"required>
                                    
                                    
									<div class="invalid-feedback">Le mot de passe est obligatoire.</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="date">Date de naissance <span class="text-danger">*</span></label>
									<input type="date" name="birthdate" id="birthdate" class="form-control" value="<?php echo isset(
             $_POST["birthdate"]
         )
             ? $_POST["birthdate"]
             : ""; ?>" required>
									<div class="invalid-feedback">La date de naissance est obligatoire.</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="phone">Téléphone <span style="font-size: 0.7em;">(facultatif)</span></label>
									<input type="text" name="phone" id="phone" class="form-control" value="<?php echo isset(
             $_POST["phone"]
         )
             ? $_POST["phone"]
             : ""; ?>">
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="image">Photo de profil <span style="font-size: 0.7em;">(facultatif)</span></label>
                                    <input type="file" name="image" class="form-control" value="<?php echo isset(
                                        $_POST["image"]
                                    )
                                        ? $_POST["image"]
                                        : ""; ?>">
								</div>

								<p class="form-text text-muted mb-3">
									En vous inscrivant vous acceptez les conditions d'utilisation.
								</p>

								<div class="text-center">
                                    <button type="submit" name='register' class="btn btn-warning ms-auto">S'inscrire</button><br>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Vous êtes déjà inscris ? <a href="login.php" class="text-dark">Se connecter</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<script defer src="./js/login.js"></script>