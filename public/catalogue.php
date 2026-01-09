<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../app/helpers.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue - MaBoutique</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header class="header">
        <div class="container header__container">
            <a href="index.html" class="header__logo">🛍️ MaBoutique</a>
            <nav class="header__nav">
                <a href="index.html" class="header__nav-link">Accueil</a>
                <a href="catalogue.php" class="header__nav-link header__nav-link--active">Catalogue</a>
                <a href="contact.php" class="header__nav-link">Contact</a>
            </nav>
            <div class="header__actions">
                <a href="panier.php" class="header__cart">🛒<span class="header__cart-badge">3</span></a>
                <a href="connexion.php" class="btn btn--primary btn--sm">Connexion</a>
            </div>
            <button class="header__menu-toggle">☰</button>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">Notre Catalogue</h1>
                <p class="page-subtitle">Découvrez tous nos produits</p>
            </div>

            <div class="catalog-layout">

                <!-- ============================================
                 SIDEBAR FILTRES
                 JOUR 6 : Formulaire GET + conservation valeurs
                 ============================================ -->
                <aside class="catalog-sidebar">
                    <form>
                        <div class="catalog-sidebar__section">
                            <h3 class="catalog-sidebar__title">Recherche</h3>
                            <!-- JOUR 6 : value="<?= htmlspecialchars($_GET['q'] ?? '') ?>" -->
                            <input type="text" name="q" class="form-input" placeholder="Rechercher...">
                        </div>

                        <div class="catalog-sidebar__section">
                            <h3 class="catalog-sidebar__title">Catégories</h3>
                            <div class="catalog-sidebar__categories">
                                <!-- JOUR 6 : checked si in_array(...) -->
                                <label class="form-checkbox">
                                    <input type="checkbox" name="categories[]" value="vetements">
                                    <span>Vêtements (4)</span>
                                </label>
                                <label class="form-checkbox">
                                    <input type="checkbox" name="categories[]" value="chaussures">
                                    <span>Chaussures (1)</span>
                                </label>
                                <label class="form-checkbox">
                                    <input type="checkbox" name="categories[]" value="accessoires">
                                    <span>Accessoires (3)</span>
                                </label>
                            </div>
                        </div>

                        <div class="catalog-sidebar__section">
                            <h3 class="catalog-sidebar__title">Prix</h3>
                            <div class="catalog-sidebar__price-inputs">
                                <div class="form-group">
                                    <label class="form-label">Min</label>
                                    <input type="number" name="price_min" class="form-input" placeholder="0 €" min="0">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Max</label>
                                    <input type="number" name="price_max" class="form-input" placeholder="100 €" min="0">
                                </div>
                            </div>
                        </div>

                        <div class="catalog-sidebar__section">
                            <h3 class="catalog-sidebar__title">Disponibilité</h3>
                            <label class="form-checkbox">
                                <input type="checkbox" name="in_stock" value="1">
                                <span>En stock uniquement</span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn--primary btn--block">Appliquer</button>
                        <a href="catalogue.php" class="btn btn--secondary btn--block mt-sm">Réinitialiser</a>
                    </form>
                </aside>

                <div class="catalog-main">
                    <div class="catalog-header">
                        <p>
                            <strong><?= $totalProducts ?></strong> produits trouvés
                            <strong><?= $productInStock ?></strong> produits en stock
                            <strong><?= $discountProduct ?></strong> produits en promo
                            <strong><?= $productOutOfStock ?></strong> produits en Rupture
                        </p>
                        <div class="catalog-header__sort">
                            <label>Trier :</label>
                            <select class="form-select" style="width:auto">
                                <option>Nom A-Z</option>
                                <option>Nom Z-A</option>
                                <option>Prix ↑</option>
                                <option>Prix ↓</option>
                            </select>
                        </div>
                    </div>

                    <!-- ============================================
                     8 PRODUITS
                     JOUR 3 : foreach
                     JOUR 4 : Badges conditionnels
                     =======================badge--out-of-stock===================== -->

                    <div class="products-grid">

                        <?php foreach ($products as $product): ?>
                            <?= createProductCard($product); ?>
                        <?php endforeach ?>

                    </div>

                    <!-- ============================================  
                     PAGINATION
                     JOUR 6 : Générer dynamiquement
                     ============================================ -->
                    <nav class="pagination">
                        <a class="pagination__item pagination__item--disabled">←</a>
                        <a class="pagination__item pagination__item--active">1</a>
                        <a class="pagination__item">2</a>
                        <a class="pagination__item">3</a>
                        <a class="pagination__item">→</a>
                    </nav>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer__grid">
                <div class="footer__section">
                    <h4>À propos</h4>
                    <p>MaBoutique - Shopping en ligne.</p>
                </div>
                <div class="footer__section">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="catalogue.php">Catalogue</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="footer__section">
                    <h4>Compte</h4>
                    <ul>
                        <li><a href="connexion.php">Connexion</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="panier.php">Panier</a></li>
                    </ul>
                </div>
                <div class="footer__section">
                    <h4>Formation</h4>
                    <ul>
                        <li><a href="#">Jour 1-5</a></li>
                        <li><a href="#">Jour 6-10</a></li>
                        <li><a href="#">Jour 11-14</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer__bottom">
                <p>&copy; 2024 MaBoutique</p>
            </div>
        </div>
    </footer>

</body>

</html>