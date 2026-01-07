<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - MaBoutique</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- ============================================
     HEADER
     JOUR 12 : Extraire dans views/layout.php
     ============================================ -->
<header class="header">
    <div class="container header__container">
        <a href="index.html" class="header__logo">
            <span>🛍️</span>
            <span>MaBoutique</span>
        </a>
        <nav class="header__nav">
            <a href="index.html" class="header__nav-link">Accueil</a>
            <a href="catalogue.html" class="header__nav-link">Catalogue</a>
            <a href="contact.html" class="header__nav-link">Contact</a>
        </nav>
        <div class="header__actions">
            <a href="panier.html" class="header__cart">
                🛒
                <span class="header__cart-badge">3</span>
            </a>
            <a href="connexion.html" class="btn btn--primary btn--sm">Connexion</a>
        </div>
        <button class="header__menu-toggle">☰</button>
    </div>
</header>

<main class="main-content">
    <div class="container">

        <div class="auth-container">

            <!-- ============================================
                 ALERTES / MESSAGES FLASH
                 JOUR 7 : Afficher $_SESSION['flash']
                 ============================================ -->
            <!-- Exemples de messages (décommenter pour voir) -->
            <!--
            <div class="alert alert--error">
                ✗ Email ou mot de passe incorrect.
                <button class="alert__close">×</button>
            </div>
            <div class="alert alert--success">
                ✓ Inscription réussie ! Vous pouvez maintenant vous connecter.
                <button class="alert__close">×</button>
            </div>
            <div class="alert alert--warning">
                ⚠ Veuillez vous connecter pour accéder à cette page.
                <button class="alert__close">×</button>
            </div>
            -->

            <!-- ============================================
                 FORMULAIRE CONNEXION
                 JOUR 6 : Validation PHP + préremplissage
                 JOUR 7 : Authentification avec $_SESSION
                 ============================================ -->
            <div class="auth-card">
                <h1 class="auth-card__title">Connexion</h1>
                <p class="auth-card__subtitle">Accédez à votre compte</p>

                <!-- JOUR 6 : action="connexion.php" method="POST" -->
                <form action="connexion.html" method="POST">

                    <div class="form-group">
                        <label for="email" class="form-label form-label--required">Email</label>
                        <!-- JOUR 6 : value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" -->
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            placeholder="votre@email.com"
                            required
                        >
                        <!-- JOUR 6 : Afficher erreur si invalide -->
                        <!-- <p class="form-error">Veuillez entrer un email valide</p> -->
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label form-label--required">Mot de passe</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="Votre mot de passe"
                            required
                            minlength="8"
                        >
                        <!-- JOUR 6 : Afficher erreur si invalide -->
                        <!-- <p class="form-error">Le mot de passe doit contenir au moins 8 caractères</p> -->
                    </div>

                    <div class="form-group">
                        <label class="form-checkbox">
                            <input type="checkbox" name="remember" value="1">
                            <span>Se souvenir de moi</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn--primary btn--block btn--lg">
                        Se connecter
                    </button>

                </form>

                <div class="auth-card__footer">
                    <p>Pas encore de compte ?</p>
                    <a href="inscription.html" class="btn btn--outline">
                        Créer un compte
                    </a>
                </div>
            </div>

        </div>

    </div>
</main>

<!-- ============================================
     FOOTER
     JOUR 12 : Extraire dans views/layout.php
     ============================================ -->
<footer class="footer">
    <div class="container">
        <div class="footer__grid">
            <div class="footer__section">
                <h4>À propos</h4>
                <p>MaBoutique - Votre destination shopping en ligne.</p>
            </div>
            <div class="footer__section">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="catalogue.html">Catalogue</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="footer__section">
                <h4>Mon compte</h4>
                <ul>
                    <li><a href="connexion.html">Connexion</a></li>
                    <li><a href="inscription.html">Inscription</a></li>
                    <li><a href="panier.html">Mon panier</a></li>
                </ul>
            </div>
            <div class="footer__section">
                <h4>Formation</h4>
                <ul>
                    <li><a href="#">Jour 1-5 : Bases</a></li>
                    <li><a href="#">Jour 6-10 : Avancé</a></li>
                    <li><a href="#">Jour 11-14 : Pro</a></li>
                </ul>
            </div>
        </div>
        <div class="footer__bottom">
            <!-- JOUR 1 : Remplacer 2024 par <?= date('Y') ?> -->
            <p>&copy; 2024 MaBoutique - Formation PHP 14 jours</p>
        </div>
    </div>
</footer>

</body>
</html>
