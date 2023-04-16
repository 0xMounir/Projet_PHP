<?php 
  if(!isset($_SESSION)) { session_start(); }
  if (isset($title)) {
    $title = "HomeStay - " . $title;
  }
  else {
    $title = "HomeStay - Accueil";
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="author" content="0xMounir">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="icon" type="image/png" href="assets/images/logo.png"/>
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <script src="assets/index.js"></script>
	<title><?= $title ?></title>

</head>
<body>