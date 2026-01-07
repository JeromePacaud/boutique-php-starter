<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - MaBoutique</title>
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
                ✗ Cet email est déjà utilisé.
                <button class="alert__close">×</button>
            </div>
            <div class="alert alert--error">
                ✗ Les mots de passe ne correspondent pas.
                <button class="alert__close">×</button>
            </div>
            -->

            <!-- ============================================
                 FORMULAIRE INSCRIPTION
                 JOUR 6 : Validation PHP + préremplissage
                 JOUR 7 : Insertion en BDD avec password_hash()
                 ============================================ -->
            <div class="auth-card">
                <h1 class="auth-card__title">Inscription</h1>
                <p class="auth-card__subtitle">Créez votre compte en quelques secondes</p>

                <!-- JOUR 6 : action="inscription.php" method="POST" -->
                <form action="inscription.html" method="POST">

                    <div class="form-group">
                        <label for="username" class="form-label form-label--required">Nom d'utilisateur</label>
                        <!-- JOUR 6 : value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" -->
                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="form-input"
                            placeholder="Votre pseudo"
                            required
                            minlength="3"
                            maxlength="50"
                        >
                        <p class="form-hint">Entre 3 et 50 caractères</p>
                        <!-- JOUR 6 : Afficher erreur si invalide -->
                        <!-- <p class="form-error">Le nom d'utilisateur doit contenir au moins 3 caractères</p> -->
                    </div>

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
                            placeholder="Minimum 8 caractères"
                            required
                            minlength="8"
                        >
                        <p class="form-hint">Au moins 8 caractères</p>
                        <!-- JOUR 6 : Afficher erreur si invalide -->
                        <!-- <p class="form-error">Le mot de passe doit contenir au moins 8 caractères</p> -->
                    </div>

                    <div class="form-group">
                        <label for="password_confirm" class="form-label form-label--required">Confirmer le mot de passe</label>
                        <input
                            type="password"
                            id="password_confirm"
                            name="password_confirm"
                            class="form-input"
                            placeholder="Retapez votre mot de passe"
                            required
                            minlength="8"
                        >
                        <!-- JOUR 6 : Vérifier que password === password_confirm -->
                        <!-- <p class="form-error">Les mots de passe ne correspondent pas</p> -->
                    </div>

                    <div class="form-group">
                        <label class="form-checkbox">
                            <!-- JOUR 6 : required + vérification côté serveur -->
                            <input type="checkbox" name="terms" value="1" required>
                            <span>J'accepte les <a href="#">conditions d'utilisation</a></span>
                        </label>
                        <!-- JOUR 6 : Afficher erreur si non coché -->
                        <!-- <p class="form-error">Vous devez accepter les conditions</p> -->
                    </div>

                    <button type="submit" class="btn btn--primary btn--block btn--lg">
                        Créer mon compte
                    </button>

                </form>

                <div class="auth-card__footer">
                    <p>Déjà un compte ?</p>
                    <a href="connexion.html" class="btn btn--outline">
                        Se connecter
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
