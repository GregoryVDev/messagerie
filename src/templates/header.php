<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="nav-logo">Messagerie</a>

        <ul class="nav-links">
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="index.php">Fil d'actualité</a></li>
                <li><a href="chat.php">Messagerie</a></li>
                <li><a href="profil.php">Mon Profil</a></li>
                <li><a href="deconnexion.php" class="btn-logout">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="inscription.php" class="btn-signup">S'inscrire</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>