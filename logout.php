<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "functions/redirect.php";

if (session_destroy()) {
    redirect("login.php");
}
?>
