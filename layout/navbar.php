<?php 
if(!isset($_SESSION)) { session_start(); }
?>

<nav class="navbar navbar-expand-lg navbar-dark p-3 bg-dark" id="headerNav">
      <div class="container-fluid">
        <a class="nav-link mx-2" href="#">
            <img src="assets/images/logo_light.png" height="80" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mx-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2" href="index.php">Accueil</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Profil
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="informations.php">Profil</a></li>
                <li><a class="dropdown-item" href="settings.php">Paramètres</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="logout.php">Se déconnecter</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>