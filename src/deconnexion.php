<?php

session_start();

$db = null;

if (isset($_SESSION["user_chat"])) {
    unset($_SESSION["user_chat"]);
    header("Location: connexion.php");
    exit();
}
