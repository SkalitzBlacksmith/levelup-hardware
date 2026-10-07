<?php
include __DIR__ . "/includes/products.php";
$id = is_string($_GET["id"] ?? null) ? $_GET["id"] : "";
$product = $products[$id] ?? null;
if (!$product) http_response_code(404);
$pageTitle = $product ? $product["name"] : "Product niet gevonden";
$pageDescription = $product ? $product["description"] : "Dit product bestaat niet.";
$activePage = "producten";
$useCart = true;
include __DIR__ . "/includes/header.php";
?>
<main class="page-shell">
  <?php if (!$product): ?>
    <h1>Product niet gevonden</h1>
    <p>Dit product staat niet in ons assortiment.</p>
    <a class="primary-button" href="producten.php">Bekijk alle producten</a>
  <?php else: ?>
    <nav class="breadcrumb" aria-label="Broodkruimel"><a href="producten.php">Producten</a> / <a href="producten.php?categorie=<?= $product['category'] ?>"><?= htmlspecialchars($categories[$product['category']]) ?></a></nav>
    <section class="content-grid product-detail">
      <div class="photo-frame detail-photo"><img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['alt']) ?>" width="500" height="500"></div>
      <div class="product-copy">
        <h1><?= htmlspecialchars($product['name']) ?></h1>
        <p class="product-price">€ <?= number_format($product['price'], 2, ',', '.') ?></p>
        <p><?= htmlspecialchars($product['description']) ?></p>
        <button class="add-to-cart" type="button" data-product="<?= $id ?>" data-name="<?= htmlspecialchars($product['name']) ?>" data-price="<?= $product['price'] ?>">Voeg toe aan winkelwagen</button>
        <p class="form-note">Voorbeeldproduct en placeholderfoto. Geen echte bestelling.</p>
      </div>
    </section>
    <section class="spec-section"><h2>Specificaties</h2>
      <dl class="spec-list"><?php foreach ($product['specs'] as $label => $spec): ?><div><dt><?= htmlspecialchars($label) ?></dt><dd><?= htmlspecialchars($spec) ?></dd></div><?php endforeach; ?></dl>
    </section>
    <?php include __DIR__ . "/includes/cart.php"; ?>
  <?php endif; ?>
</main>
<?php include __DIR__ . "/includes/footer.php"; ?>
