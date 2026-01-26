<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../app/helpers.php");

// Constantes
define("MAX_PRICE", 10000.00);

// RÉCUPÉRATION DES FILTRES

$search = trim($_GET['search'] ?? '');
$category = $_GET['category'] ?? [];
$stock = isset($_GET['stock']) ? 1 : 0;
$priceMin = isset($_GET['price_min']) && $_GET['price_min'] !== '' ? (float)$_GET['price_min'] : 0;
$priceMax = isset($_GET['price_max']) && $_GET['price_max'] !== '' ? (float)$_GET['price_max'] : MAX_PRICE;
$sort = $_GET['sort'] ?? 'name_asc';
$page = isset($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;

// Catégories disponibles
$categories = ['tech', 'accessoire', 'meuble'];

// FILTRAGE DES PRODUITS

$filtered = array_filter($products, function ($p) use ($search, $category, $stock, $priceMin, $priceMax) {
    // Filtre recherche
    if ($search && stripos($p['name'], $search) === false && stripos($p['description'], $search) === false) {
        return false;
    }

    // Filtre catégorie (multiples possibles)
    if (!empty($category) && !in_array($p['category'], $category)) {
        return false;
    }

    // Filtre stock
    if ($stock && $p['stock'] <= 0) {
        return false;
    }

    // Filtre prix
    if ($p['price'] < $priceMin || $p['price'] > $priceMax) {
        return false;
    }

    return true;
});

// TRI DES RÉSULTATS

usort($filtered, function ($a, $b) use ($sort) {
    switch ($sort) {
        case 'price_asc':
            return $a['price'] <=> $b['price'];

        case 'price_desc':
            return $b['price'] <=> $a['price'];

        case 'name_desc':
            return strcasecmp($b['name'], $a['name']);

        case 'rating_desc':
            return $b['rating'] <=> $a['rating'];

        case 'date_desc':
            return $b['addDate'] <=> $a['addDate'];

        case 'name_asc':
        default:
            return strcasecmp($a['name'], $b['name']);
    }
});

// PAGINATION (FAIT AVEC IA)

$perPage = 10;
$totalResults = count($filtered);
$totalPages = max(1, ceil($totalResults / $perPage));

// Sécuriser la page demandée
$page = min($page, $totalPages);

$offset = ($page - 1) * $perPage;
$paginatedResults = array_slice($filtered, $offset, $perPage);


// FONCTION POUR CONSTRUIRE L'URL AVEC FILTRES (FAIT AVEC IA)

function buildUrl($params = [])
{
    global $search, $category, $priceMin, $priceMax, $sort, $stock;

    $defaults = [
        'search' => $search,
        'category' => $category,
        'price_min' => $priceMin > 0 ? $priceMin : '',
        'price_max' => $priceMax < MAX_PRICE ? $priceMax : '',
        'sort' => $sort,
        'stock' => $stock
    ];

    $merged = array_merge($defaults, $params);

    // Nettoyer les valeurs vides
    $query = [];
    foreach ($merged as $key => $value) {
        if ($key === 'category' && is_array($value) && !empty($value)) {
            foreach ($value as $cat) {
                $query[] = "category[]=" . urlencode($cat);
            }
        } elseif ($key !== 'category' && $value !== '' && $value !== null && $value !== 0) {
            $query[] = urlencode($key) . "=" . urlencode($value);
        }
    }

    return 'catalogue.php' . (empty($query) ? '' : '?' . implode('&', $query));
}
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
            <a href="index.html" class="header__logo">🛒 MaBoutique</a>
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
                    <form method="get">
                        <!-- RECHERCHE -->
                        <div class="catalog-sidebar__section">
                            <h3 class="catalog-sidebar__title">Recherche</h3>
                            <input
                                type="text"
                                name="search"
                                class="form-input"
                                placeholder="Rechercher..."
                                value="<?= htmlspecialchars($search) ?>">
                        </div>

                        <!-- CATÉGORIES -->
                        <div class="catalog-sidebar__section">
                            <h3 class="catalog-sidebar__title">Catégories</h3>
                            <div class="catalog-sidebar__categories">
                                <?php foreach ($categories as $c): ?>
                                    <label class="form-checkbox">
                                        <input
                                            type="checkbox"
                                            name="category[]"
                                            value="<?= $c ?>"
                                            <?= in_array($c, $category) ? 'checked' : '' ?>>
                                        <span><?= ucfirst($c) ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- PRIX -->
                        <div class="catalog-sidebar__section">
                            <h3 class="catalog-sidebar__title">Prix</h3>
                            <div class="catalog-sidebar__price-inputs">
                                <div class="form-group">
                                    <label class="form-label">Min</label>
                                    <input
                                        type="number"
                                        name="price_min"
                                        class="form-input"
                                        placeholder="0 €"
                                        min="0"
                                        step="10"
                                        value="<?= $priceMin > 0 ? $priceMin : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Max</label>
                                    <input
                                        type="number"
                                        name="price_max"
                                        class="form-input"
                                        placeholder="1000 €"
                                        min="0"
                                        step="10"
                                        value="<?= $priceMax < MAX_PRICE ? $priceMax : '' ?>">
                                </div>
                            </div>
                        </div>

                        <!-- DISPONIBILITÉ -->
                        <div class="catalog-sidebar__section">
                            <h3 class="catalog-sidebar__title">Disponibilité</h3>
                            <label class="form-checkbox">
                                <input type="checkbox" name="stock" <?= $stock ? 'checked' : '' ?>>
                                <span>En stock uniquement</span>
                            </label>
                        </div>

                        <!-- Conserver le tri et la page actuelle -->
                        <input type="hidden" name="sort" value="<?= htmlspecialchars($sort) ?>">

                        <button type="submit" class="btn btn--primary btn--block">Appliquer</button>
                        <a href="catalogue.php" class="btn btn--secondary btn--block mt-sm">Réinitialiser</a>
                    </form>
                </aside>

                <!-- ZONE PRINCIPALE -->
                <div class="catalog-main">
                    <div class="catalog-header">
                        <p>
                            <strong><?= $totalResults ?></strong> produit<?= $totalResults > 1 ? 's' : '' ?> trouvé<?= $totalResults > 1 ? 's' : '' ?>
                            <?php if ($totalResults !== $totalProducts): ?>
                                <span style="color: #64748b;"> sur <?= $totalProducts ?></span>
                            <?php endif; ?>
                        </p>
                        <div class="catalog-header__sort">
                            <label>Trier :</label>
                            <select class="form-select" style="width:auto" onchange="location.href=this.value">
                                <option value="<?= buildUrl(['sort' => 'name_asc', 'page' => 1]) ?>" <?= $sort === 'name_asc' ? 'selected' : '' ?>>
                                    Nom A-Z
                                </option>
                                <option value="<?= buildUrl(['sort' => 'name_desc', 'page' => 1]) ?>" <?= $sort === 'name_desc' ? 'selected' : '' ?>>
                                    Nom Z-A
                                </option>
                                <option value="<?= buildUrl(['sort' => 'price_asc', 'page' => 1]) ?>" <?= $sort === 'price_asc' ? 'selected' : '' ?>>
                                    Prix croissant ↑
                                </option>
                                <option value="<?= buildUrl(['sort' => 'price_desc', 'page' => 1]) ?>" <?= $sort === 'price_desc' ? 'selected' : '' ?>>
                                    Prix décroissant ↓
                                </option>
                                <option value="<?= buildUrl(['sort' => 'rating_desc', 'page' => 1]) ?>" <?= $sort === 'rating_desc' ? 'selected' : '' ?>>
                                    Meilleures notes
                                </option>
                                <option value="<?= buildUrl(['sort' => 'date_desc', 'page' => 1]) ?>" <?= $sort === 'date_desc' ? 'selected' : '' ?>>
                                    Plus récents
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- GRILLE DE PRODUITS -->
                    <?php if (empty($paginatedResults)): ?>
                        <div class="alert alert-warning">
                            Aucun produit trouvé avec ces critères.
                            <a href="catalogue.php">Réinitialiser les filtres</a>
                        </div>
                    <?php else: ?>
                        <!-- ============================================
                        8 PRODUITS
                        JOUR 3 : foreach
                        JOUR 4 : Badges conditionnels
                        =======================badge--out-of-stock===================== -->
                        <div class="products-grid">
                            <?php foreach ($paginatedResults as $product): ?>
                                <?= createProductCard($product); ?>
                            <?php endforeach; ?>
                        </div>

                        <!-- ============================================  
                        PAGINATION
                        JOUR 6 : Générer dynamiquement
                        ============================================ -->
                        <?php if ($totalPages > 1): ?>
                            <nav class="pagination">
                                <!-- Bouton Précédent -->
                                <?php if ($page > 1): ?>
                                    <a href="<?= buildUrl(['page' => $page - 1]) ?>" class="pagination__item">
                                        ← Précédent
                                    </a>
                                <?php else: ?>
                                    <span class="pagination__item pagination__item--disabled">← Précédent</span>
                                <?php endif; ?>

                                <!-- Numéros de pages avec "..." -->
                                <?php
                                $start = max(1, $page - 2);
                                $end = min($totalPages, $page + 2);

                                // Première page si on est loin
                                if ($start > 1): ?>
                                    <a href="<?= buildUrl(['page' => 1]) ?>" class="pagination__item">1</a>
                                    <?php if ($start > 2): ?>
                                        <span class="pagination__item pagination__item--disabled">...</span>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <!-- Pages autour de la page courante -->
                                <?php for ($i = $start; $i <= $end; $i++): ?>
                                    <?php if ($i === $page): ?>
                                        <span class="pagination__item pagination__item--active"><?= $i ?></span>
                                    <?php else: ?>
                                        <a href="<?= buildUrl(['page' => $i]) ?>" class="pagination__item"><?= $i ?></a>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <!-- Dernière page si on est loin -->
                                <?php if ($end < $totalPages): ?>
                                    <?php if ($end < $totalPages - 1): ?>
                                        <span class="pagination__item pagination__item--disabled">...</span>
                                    <?php endif; ?>
                                    <a href="<?= buildUrl(['page' => $totalPages]) ?>" class="pagination__item"><?= $totalPages ?></a>
                                <?php endif; ?>

                                <!-- Bouton Suivant -->
                                <?php if ($page < $totalPages): ?>
                                    <a href="<?= buildUrl(['page' => $page + 1]) ?>" class="pagination__item">
                                        Suivant →
                                    </a>
                                <?php else: ?>
                                    <span class="pagination__item pagination__item--disabled">Suivant →</span>
                                <?php endif; ?>
                            </nav>
                        <?php endif; ?>
                    <?php endif; ?>
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
                <p>&copy; 2024 MaBoutique - Jour 6 : Filtrage Avancé</p>
            </div>
        </div>
    </footer>
</body>

</html>