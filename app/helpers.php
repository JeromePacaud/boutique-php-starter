<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "data.php";

$totalProducts = count($products);
$productInStock = numberOfProductsInStock($products);
$productOutOfStock = numberOfProductsOutOfStock($products);
$discountProduct = numberOfDiscountProduct($products);

function isNewArticle(array $data): bool
{
    $addDate = $data["addDate"];
    $today = new DateTime(date("y-m-d"));

    $interval = $today->diff($addDate);
    // echo $interval->days;
    return $interval->days < 30 ? true : false;
}

function isDiscount(int $discount): bool
{
    return $discount > 0 ? true : false;
}

function isLastArticles(int $stock): bool
{
    return $stock > 0 && $stock < 5 ? true : false;
}

function isOutOfStock(int $stock, $discount): bool
{
    return $stock === 0 && $discount > 0 ? true : false;
}

function getBadge(array $data): array
{
    $discount = $data["discount"];
    $stock = $data["stock"];
    $isNew = isNewArticle($data);
    $isDiscount = isDiscount($discount);
    $isLast = isLastArticles($stock);
    $outOfStock = isOutOfStock($stock, $discount);
    $badges = [];

    if ($stock === 0) {
        return ["badge--out-of-stock"];
    }

    if ($isNew) {
        $badges[] = "badge--new";
    }

    if ($isLast) {
        $badges[] = "badge--low-stock";
    }

    if ($outOfStock) {
        $badges[] = "badge--out-of-stock";
    }

    if ($isDiscount) {
        $badges[] = "badge--promo";
    }

    return $badges;
}

function inStockOrOutOfStockText(int $stock): string
{
    return $stock > 0 ? "✓ En stock ($stock)" : "✗ Rupture";
}

function disableButton(int $stock): string
{
    return $stock === 0 ? "disabled" : " ";
}

function getStockClass(int $stock): string
{
    return $stock === 0 ? "product-card__stock--out" : "product-card__stock--available";
}

function getBadgeText(string $class, array $data): string
{

    $textNewArticle = "Nouveau";
    $textDiscount = "PROMO " . "-" . $data["discount"] . "%";
    $textLastArticles = "Dernier";
    $textOutOfStock = "Rupture";

    switch ($class) {
        case "badge--new":
            $text = $textNewArticle;
            break;
        case "badge--promo":
            $text = $textDiscount;
            break;
        case "badge--low-stock":
            $text = $textLastArticles;
            break;
        case "badge--out-of-stock";
            $text = $textOutOfStock;
            break;
        default:
            $text = "";
    }

    return $text;
}

function numberOfProductsOutOfStock(array $datas): int
{
    $count = 0;
    foreach ($datas as $data) {
        if ($data["stock"] === 0) {
            $count++;
        }
    }

    return $count;
}

function numberOfDiscountProduct(array $datas): int
{
    $count = 0;
    foreach ($datas as $data) {
        if ($data["discount"] > 0) {
            $count++;
        }
    }

    return $count;
}

function numberOfProductsInStock(array $datas): int
{
    $count = 0;
    foreach ($datas as $data) {
        if ($data["stock"] > 0) {
            $count++;
        }
    }

    return $count;
}

function calcultateDiscount(float $price, float $percentage): float
{
    return $price - ($price * ($percentage / 100));
}

function displayPrice(float $price, int $stock, float $discount = 0): string
{
    if ($stock === 0) {
        return "<span class=\"product-card__price-current\">$price €</span>";
    }
    if ($discount > 0) {
        $discountPrice = calcultateDiscount($price, $discount);
        $discountPrice = number_format($discountPrice, 2);
        return "<strike class=\"product-card__price-current\">$price €</strike><span class=\"product-card__price-current\">$discountPrice €</span>";
    }

    return "<span class=\"product-card__price-current\">$price €</span>";
}

function createProductCard(array $data): string
{
    $name = htmlspecialchars($data["name"]);
    $price = $data["price"];
    $stock = $data["stock"];
    $category = $data["category"];
    $discount = $data["discount"];

    $classes = getBadge($data);
    $inOrOutOfStock = inStockOrOutOfStockText($stock);
    $disableButton = disableButton($stock);
    $stockClass = getStockClass($stock);
    $priceText = displayPrice($price, $stock, $discount);

    $badgesHtml = "";

    foreach ($classes as $class) {
        $badgeText = getBadgeText($class, $data);
        $badgesHtml .= "<span class=\"badge $class\">$badgeText</span>";
    }

    return <<<HTML
        <article class="product-card">
            <div class="product-card__image-wrapper">
                <img src="https://via.placeholder.com/300x300/e2e8f0/64748b?text=T-shirt" alt="T-shirt" class="product-card__image">
                <div class="product-card__badges">
                    $badgesHtml
                </div>
            </div>
            <div class="product-card__content">
                <span class="product-card__category"> $category </span>
                <a href="produit.html?id=1" class="product-card__title"> $name </a>
                <div class="product-card__price">
                    $priceText
                </div>
                <p class="product-card__stock $stockClass"> 
                    $inOrOutOfStock 
                </p>
                <div class="product-card__actions">
                    <form action="panier.php" method="POST">
                        <input type="hidden" name="product_id" value="1">
                        <button type="submit" class="btn btn--primary btn--block" $disableButton>Ajouter</button>
                    </form>
                </div>
            </div>
        </article>
HTML;
}
