<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fil d'actualité - MiniFB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./templates/header.css">
</head>

<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="nav-logo">MiniFB</a>
        <ul class="nav-links">
            <?php if (isset($_SESSION['user_chat'])) { ?>
                <li><a href="index.php">Fil d'actualité</a></li>
                <li><a href="chat.php">Messagerie</a></li>
                <li><a href="profil.php">Mon Profil</a></li>
                <li><a href="deconnexion.php" class="btn-logout">Déconnexion</a></li>
            <?php } else { ?>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="inscription.php" class="btn-signup">S'inscrire</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>