<?php include "./templates/header.php";

// On vérifie si l'utilisateur est connecté
if (isset($_SESSION["user_chat"])) {
    $classe_flou = ""; // Accès si il est co (pas de div)
    $afficher_connexion = false; // Pas de popup de connexion
} else {
    $classe_flou = "page-blur"; // On prépare le flou
    $afficher_connexion = true; // On prépare l'affichage du popup
}

?>

<body <?php if ($afficher_connexion) echo 'style="overflow:hidden;"'; ?>>
    <div class="main-popup <?= $classe_flou ?>">
        <div class="container">
        </div>
    </div>

    <?php if ($afficher_connexion) : ?>
        <div class="auth-overlay">
            <div class="auth-modal">
                <h2>Connectez-vous</h2>
                <p>Accès réservé aux membres.</p>
                <div class="modal-buttons">
                    <a href="connexion.php" class="btn-login">Se connecter</a>
                    <a href="inscription.php" class="btn-register">Créer un compte</a>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="main-layout">
            <div class="container">
                <aside class="sidebar">...</aside>
                <main class="feed">...</main>
            </div>
        </div>
    <?php endif; ?>
    </div>
    <div class="main-layout <?= $classe_flou ?>">
        <div class="container">

            <aside class="sidebar">
                <div class="card profile-widget">
                    <div class="banner"></div>
                    <div class="profile-content">
                        <img src="https://ui-avatars.com/api/?name=Utilisateur&background=1877f2&color=fff" class="avatar-lg">
                        <h3>Pseudo Utilisateur</h3>
                        <p>Développeur PHP en herbe</p>
                    </div>
                    <div class="profile-stats">
                        <div class="stat"><span>124</span> Amis</div>
                        <div class="stat"><span>42</span> Posts</div>
                    </div>
                </div>
            </aside>

            <main class="feed">

                <div class="card post-creator">
                    <div class="creator-header">
                        <img src="https://ui-avatars.com/api/?name=Utilisateur" class="avatar-sm">
                        <textarea placeholder="Quoi de neuf aujourd'hui ?"></textarea>
                    </div>
                    <div class="creator-actions">
                        <div class="media-btns">
                            <button class="action-btn"><i class="fa-solid fa-image" style="color: #45bd62;"></i> Photo</button>
                            <button class="action-btn"><i class="fa-solid fa-video" style="color: #f02849;"></i> Vidéo</button>
                        </div>
                        <button class="btn-primary">Publier</button>
                    </div>
                </div>

                <div class="posts-list">

                    <div class="card post">
                        <div class="post-header">
                            <img src="https://ui-avatars.com/api/?name=Maman&background=random" class="avatar-sm">
                            <div class="post-info">
                                <h4>Maman</h4>
                                <span>Il y a 15 min • <i class="fa-solid fa-earth-europe"></i></span>
                            </div>
                            <button class="btn-more"><i class="fa-solid fa-ellipsis"></i></button>
                        </div>
                        <div class="post-body">
                            <p>Coucou ! Ton nouveau site avance bien ? N'oublie pas de venir manger ce soir ! 🍝</p>
                        </div>
                        <div class="post-footer">
                            <button class="footer-btn"><i class="fa-regular fa-thumbs-up"></i> J'aime</button>
                            <button class="footer-btn"><i class="fa-regular fa-comment"></i> Commenter</button>
                            <button class="footer-btn"><i class="fa-solid fa-share"></i> Partager</button>
                        </div>
                    </div>

                    <div class="card post">
                        <div class="post-header">
                            <img src="https://ui-avatars.com/api/?name=Papa&background=random" class="avatar-sm">
                            <div class="post-info">
                                <h4>Papa</h4>
                                <span>Il y a 1 heure</span>
                            </div>
                            <button class="btn-more"><i class="fa-solid fa-ellipsis"></i></button>
                        </div>
                        <div class="post-body">
                            <p>C'est du beau boulot ce code PHP ! Fier de toi ! 👍</p>
                        </div>
                        <div class="post-footer">
                            <button class="footer-btn"><i class="fa-regular fa-thumbs-up"></i> J'aime</button>
                            <button class="footer-btn"><i class="fa-regular fa-comment"></i> Commenter</button>
                            <button class="footer-btn"><i class="fa-solid fa-share"></i> Partager</button>
                        </div>
                    </div>

                </div>
            </main>

        </div>
    </div>

</body>

</html>