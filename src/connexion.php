<?php
if (!empty($_POST)) {

    // Vérifie si les champs sont remplis
    if (isset($_POST["login"], $_POST["pass"]) && !empty($_POST["login"]) && !empty($_POST["pass"])) {

        require_once("./connect.php");

        // Recherche l'utilisateur par email ou pseudo
        $sql = "SELECT * FROM users WHERE email = :login OR pseudo = :login";
        $query = $db->prepare($sql);
        $query->bindValue(":login", $_POST["login"]);
        $query->execute();

        $user = $query->fetch();

        // Vérifie si utilisateur existe et mot de passe correct
        if ($user && password_verify($_POST["pass"], $user["pass"])) {

            // Création de la session
            $_SESSION["user_chat"] = [
                "user_id" => $user["user_id"],
                "pseudo" => $user["pseudo"],
                "email" => $user["email"],
                "user" => true
            ];

            header("Location: index.php");
            exit();
        } else {
            $errorMessage = "L'utilisateur ou le mot de passe est incorrect";
        }
    } else {
        $errorMessage = "Le formulaire est incomplet";
    }
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="auth-container">
        <form action="" method="POST" class="auth-form">
            <h2>Connexion</h2>
            <p>Heureux de vous revoir !</p>
            <hr>

            <?php if (isset($errorMessage)): ?>
                <div class="error-msg"><?= $errorMessage ?></div>
            <?php endif; ?>

            <div class="input-group">
                <label for="email">Email ou Pseudo</label>
                <input type="text" name="login" id="email" placeholder="Email ou pseudo" required>
            </div>

            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="pass" id="password" placeholder="Mot de passe" required>
            </div>

            <button type="submit" class="btn-auth">Se connecter</button>

            <div class="auth-footer">
                Nouveau sur le site ? <a href="inscription.php">Créer un compte</a>
            </div>
        </form>
    </div>

</body>

</html>