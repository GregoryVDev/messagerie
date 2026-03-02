<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="auth-container">
        <form action="traitement_inscription.php" method="POST" class="auth-form">
            <h2>Créer un compte</h2>
            <p>C'est rapide et facile.</p>
            <hr>

            <div class="input-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" required>
            </div>

            <div class="input-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" id="email" placeholder="nom@exemple.com" required>
            </div>

            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Minimum 8 caractères" required>
            </div>

            <div class="input-group">
                <label for="password_confirm">Confirmer le mot de passe</label>
                <input type="password" name="password_confirm" id="password_confirm" required>
            </div>

            <button type="submit" class="btn-auth">S'inscrire</button>

            <div class="auth-footer">
                Déjà inscrit ? <a href="connexion.php">Se connecter</a>
            </div>
        </form>
    </div>

</body>

</html>