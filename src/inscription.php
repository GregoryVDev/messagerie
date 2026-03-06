<?php

require_once("./connect.php");
// Fonction pour filtrer et garder les vrais emails
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// On vérifie si le formulaire est bien rempli
if (!empty($_POST)) {
    if (isset($_POST["pseudo"], $_POST["email"], $_POST["pass"], $_POST["pass2"]) && !empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["pass2"])) {

        // Il retire les balises dangereuses en HTML, ni mettre des scripts malveillant
        $pseudo = strip_tags($_POST["pseudo"]);

        if (!validateEmail($_POST["email"])) {
            $errorMessage = "L'adresse mail est incorrecte.";
        }

        if (isset($_POST["pass"]) && isset($_POST["pass2"])) {
            $pass = $_POST["pass"];
            $pass2 = $_POST["pass2"];
        }

        // Vérification des critères du mot de passe
        $passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\W_]).{6,}$/";
        // On vérifie si PasswordPattern est bien respecté dans $pass
        if (!preg_match($passwordPattern, $pass)) {
            $errorMessage = "Le mot de passe doit contenir :
            <ul style='color: red;'>
                <li>- Au moins une lettre majuscule</li>
                <li>- Au moins une lettre minuscule</li>
                <li>- Au moins un chiffre</li>
                <li>- Au moins un caractère spécial</li>
                <li>- 6 caractères minimum</li>
            </ul>";
        } elseif ($pass === $pass2) {
            $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);
        } else {
            $errorMessage = "Les mots de pass ne correspondent pas.";
        }
    }

    if (empty($errorMessage)) {
        $sql = "INSERT INTO users (pseudo, email, pass) VALUES (:pseudo, :email, :pass)";
        $query = $db->prepare($sql);
        $query->bindValue(":pseudo", $pseudo);
        $query->bindValue(":email", $_POST["email"]);
        $query->bindValue(":pass", $pass);
        $query->execute();

        header("Location: connexion.php");
        exit();
    } else {
        $errorMessage = "Le formulaire est incomplet.";
    }
}




?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./templates/header.css">
</head>

<body>

    <?php include "./templates/header.php" ?>

    <div class="auth-container">
        <form action="" method="POST" class="auth-form">
            <h2>Créer un compte</h2>
            <p>C'est rapide et facile.</p>
            <hr>

            <div class="input-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo"
                    value="<?= isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : '' ?>"
                    placeholder="Votre pseudo" required>
            </div>

            <div class="input-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" id="email"
                    value="<?= isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '' ?>"
                    placeholder="nom@exemple.com" required>
            </div>

            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="pass" id="password" placeholder="Minimum 8 caractères" required>
            </div>

            <div class="input-group">
                <label for="password_confirm">Confirmer le mot de passe</label>
                <input type="password" name="pass2" id="password_confirm" required>
            </div>

            <button type="submit" class="btn-auth">S'inscrire</button>

            <div class="auth-footer">
                Déjà inscrit ? <a href="connexion.php">Se connecter</a>
            </div>
        </form>
    </div>

</body>

</html>