<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - MaBoutique</title>
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
            <a href="contact.html" class="header__nav-link header__nav-link--active">Contact</a>
        </nav>
        <div class="header__actions">
            <a href="panier.html" class="header__cart">
                🛒
                <!-- JOUR 7 : <?= count($_SESSION['cart'] ?? []) ?> -->
                <span class="header__cart-badge">3</span>
            </a>
            <a href="connexion.html" class="btn btn--primary btn--sm">Connexion</a>
        </div>
        <button class="header__menu-toggle">☰</button>
    </div>
</header>

<main class="main-content">
    <div class="container">

        <div class="page-header">
            <h1 class="page-title">Contactez-nous</h1>
            <p class="page-subtitle">Une question ? N'hésitez pas à nous écrire</p>
        </div>

        <!-- ============================================
             ALERTES / MESSAGES FLASH
             JOUR 7 : Afficher $_SESSION['flash']
             ============================================ -->
        <!-- Exemples de messages (décommenter pour voir) -->
        <!--
        <div class="alert alert--success">
            ✓ Votre message a été envoyé avec succès ! Nous vous répondrons sous 48h.
            <button class="alert__close">×</button>
        </div>
        <div class="alert alert--error">
            ✗ Une erreur s'est produite. Veuillez réessayer.
            <button class="alert__close">×</button>
        </div>
        -->

        <!-- ============================================
             FORMULAIRE CONTACT
             JOUR 6 : Validation PHP + préremplissage
             ============================================ -->
        <div class="contact-layout">
            <div class="contact-form">
                <h2 class="contact-form__title">Envoyez-nous un message</h2>

                <!-- JOUR 6 : action="contact.php" method="POST" -->
                <form action="contact.html" method="POST">

                    <div class="form-group">
                        <label for="name" class="form-label form-label--required">Nom complet</label>
                        <!-- JOUR 6 : value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" -->
                        <!-- JOUR 7 : Si connecté, préremplir avec $_SESSION['user']['username'] -->
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-input"
                            placeholder="Votre nom"
                            required
                            minlength="2"
                        >
                        <!-- JOUR 6 : Afficher erreur si invalide -->
                        <!-- <p class="form-error">Veuillez entrer votre nom</p> -->
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label form-label--required">Email</label>
                        <!-- JOUR 6 : value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" -->
                        <!-- JOUR 7 : Si connecté, préremplir avec $_SESSION['user']['email'] -->
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
                        <label for="subject" class="form-label form-label--required">Sujet</label>
                        <!-- JOUR 6 : Conserver la sélection -->
                        <select id="subject" name="subject" class="form-select" required>
                            <option value="">Choisissez un sujet</option>
                            <!-- JOUR 6 : selected="<?= $_POST['subject'] === 'question' ? 'selected' : '' ?>" -->
                            <option value="question">Question sur un produit</option>
                            <option value="commande">Suivi de commande</option>
                            <option value="retour">Retour / Remboursement</option>
                            <option value="partenariat">Partenariat</option>
                            <option value="autre">Autre</option>
                        </select>
                        <!-- JOUR 6 : Afficher erreur si non sélectionné -->
                        <!-- <p class="form-error">Veuillez sélectionner un sujet</p> -->
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label form-label--required">Message</label>
                        <!-- JOUR 6 : <?= htmlspecialchars($_POST['message'] ?? '') ?> -->
                        <textarea
                            id="message"
                            name="message"
                            class="form-textarea"
                            placeholder="Décrivez votre demande..."
                            required
                            minlength="10"
                            rows="6"
                        ></textarea>
                        <p class="form-hint">Minimum 10 caractères</p>
                        <!-- JOUR 6 : Afficher erreur si invalide -->
                        <!-- <p class="form-error">Votre message doit contenir au moins 10 caractères</p> -->
                    </div>

                    <button type="submit" class="btn btn--primary btn--lg">
                        Envoyer le message
                    </button>

                </form>
            </div>

            <aside class="contact-info">
                <h3 class="contact-info__title">Informations</h3>

                <div class="contact-info__item">
                    <div class="contact-info__icon">📍</div>
                    <div>
                        <div class="contact-info__label">Adresse</div>
                        <div class="contact-info__value">
                            123 Rue du Commerce<br>
                            75001 Paris, France
                        </div>
                    </div>
                </div>

                <div class="contact-info__item">
                    <div class="contact-info__icon">📧</div>
                    <div>
                        <div class="contact-info__label">Email</div>
                        <div class="contact-info__value">
                            contact@maboutique.fr
                        </div>
                    </div>
                </div>

                <div class="contact-info__item">
                    <div class="contact-info__icon">📞</div>
                    <div>
                        <div class="contact-info__label">Téléphone</div>
                        <div class="contact-info__value">
                            01 23 45 67 89
                        </div>
                    </div>
                </div>

                <div class="contact-info__item">
                    <div class="contact-info__icon">🕐</div>
                    <div>
                        <div class="contact-info__label">Horaires</div>
                        <div class="contact-info__value">
                            Lun - Ven : 9h - 18h<br>
                            Sam : 10h - 16h
                        </div>
                    </div>
                </div>
            </aside>
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
