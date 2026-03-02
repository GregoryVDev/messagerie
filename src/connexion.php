<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="auth-container">
        <form action="traitement_connexion.php" method="POST" class="auth-form">
            <h2>Connexion</h2>
            <p>Heureux de vous revoir !</p>
            <hr>

            <?php if (isset($_GET['error'])): ?>
                <div class="error-msg">Identifiants incorrects.</div>
            <?php endif; ?>

            <div class="input-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe" required>
            </div>

            <button type="submit" class="btn-auth">Se connecter</button>

            <div class="auth-footer">
                Nouveau sur le site ? <a href="inscription.php">Créer un compte</a>
            </div>
        </form>
    </div>

</body>

</html>