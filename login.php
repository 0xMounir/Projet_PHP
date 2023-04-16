<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "functions/redirect.php";

if (isset($_SESSION["email"])) {
    redirect("index.php");
}

include "login_process.php";

include "layout/header.php";
?>   

<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center">
						<img src="assets/images/logo.png" alt="logo" class="img-fluid w-50">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
            <?php if (isset($_GET["action"]) && $_GET["action"] == "joined") {
                echo "<h3 style=color:green;>Inscription terminée, vous pouvez vous connecter !<h/3>";
            } ?>
							<h1 class="fs-4 card-title fw-bold mb-4">Connexion</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Adresse mail</label>
									<input id="email" type="email" class="form-control" name="email" value="<?php echo isset(
             $_POST["email"]
         )
             ? $_POST["email"]
             : ""; ?>" required autofocus>
									<div class="invalid-feedback">
										Adresse mail invalide.
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Mot de passe</label>
										<a href="forgot.php" class="float-end text-warning">
											Mot de passe oublié ?
										</a>
									</div>
									<input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe" required>
								    <div class="invalid-feedback">
								    	Mot de passe invalide.
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input bg-warning">
										<label for="remember" class="form-check-label">Se souvenir de moi</label>
									</div>
									<button type="submit" class="btn ms-auto btn-warning">
										Se connecter
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Vous n’avez pas de compte ? <a href="register.php" class="text-dark">Inscrivez-vous</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="js/login.js"></script>