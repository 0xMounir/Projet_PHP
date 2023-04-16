<?php

require_once "functions/redirect.php";
require_once "functions/isTrueFalse.php";
require_once "functions/isTest.php";
require_once "./config/pdo.php";

if (!isset($_GET["id"]) && empty($_GET["id"])) {
    redirect("index.php");
}

$id = $_GET["id"];

$stmt = $pdo->prepare("SELECT * FROM properties WHERE id=:id");
// 2 - Exécute ma requête
$result = $stmt->execute(["id" => $id]);
$propertie = $stmt->fetch();

if (!$propertie) {
    http_response_code(404);
    redirect("error.php");
    exit();
}

$title = strip_tags($propertie["name"]);

include "layout/header.php";
include "layout/navbar.php";
?>
<div class="container my-5">

<div class="row">

    <div class="col-md-6">
        <img class="img-fluid details-img" src="uploads/<?= strip_tags(
            $propertie["image"]
        ) ?>" alt="">
    </div>
    <div class="col-md-6">
        <h3><?= strip_tags($propertie["name"]) ?></h3>
        <p><?= strip_tags($propertie["total_occupancy"]) .
            " occupants • " .
            strip_tags($propertie["bedrooms_count"]) .
            " chambres • " .
            strip_tags($propertie["square_m"]) .
            "m²" ?></p><br>
        
        <h5><?= strip_tags($propertie["price_day"]) ?>€ par nuit</h5>

        <p><?= strip_tags($propertie["adress"]) .
            " " .
            strip_tags($propertie["zip_code"]) .
            " " .
            strip_tags($propertie["city"]) ?></p>
                
        <i class="fa fa-bed"></i><p><?= strip_tags(
            $propertie["bedrooms_count"]
        ) ?> chambres</p>
        <i class="fa fa-shower"></i><p><?= strip_tags(
            $propertie["bathrooms_count"]
        ) ?> salles de bain</p>


        <p class="par-title mt-4 mb-1 text-warning">A propos</p>
        <p class="dummy-description mb-4"><?= strip_tags(
            $propertie["description"]
        ) ?></p>

        <a class="btn btn-primary btn-warning">Réserver</a>

    </div>
</div>
<!-- End row -->
</div>
<!-- End Container -->