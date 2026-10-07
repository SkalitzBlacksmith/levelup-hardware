<?php
$pageTitle = "Producten";
$pageDescription = "Bekijk gaming systemen, monitoren, randapparatuur en upgrades.";
$activePage = "producten";
$useCart = true;
include __DIR__ . "/includes/products.php";
$category = is_string($_GET["categorie"] ?? null) ? $_GET["categorie"] : "";
if (!isset($categories[$category])) $category = "";
$visibleProducts = $products;
if ($category !== "") {
    $visibleProducts = array_filter($products, function ($product) use ($category) {
        return $product["category"] === $category;
    });
}
include __DIR__ . "/includes/header.php";
?>
<main class="page-shell">
  <section class="page-hero">
    <h1 class="home-glow" data-text="Producten">Producten</h1>
    <p class="hero-subtitle">Voor jouw volgende level</p>
  </section>
  <nav class="category-nav" aria-label="Productcategorieën">
    <a href="producten.php" class="<?= $category === '' ? 'selected' : '' ?>">Alle gear</a>
    <?php foreach ($categories as $slug => $label): ?>
      <a href="producten.php?categorie=<?= $slug ?>" class="<?= $category === $slug ? 'selected' : '' ?>"><?= htmlspecialchars($label) ?></a>
    <?php endforeach; ?>
  </nav>
  <p class="product-count"><?= count($visibleProducts) + 1 ?> producten</p>
  <p class="form-note">Voorbeeldassortiment voor deze schoolwebsite. Foto's zijn placeholders; namen, specificaties en prijzen zijn demo-inhoud.</p>
  <section class="product-list" aria-label="Assortiment">
    <?php foreach ($visibleProducts as $id => $product): ?>
      <article class="product-row">
        <a class="photo-frame product-photo" href="product.php?id=<?= $id ?>" aria-label="Bekijk <?= htmlspecialchars($product['name']) ?>">
          <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['alt']) ?>" loading="lazy" width="400" height="400">
        </a>
        <div class="product-copy">
          <p class="category-label"><?= htmlspecialchars($categories[$product['category']]) ?></p>
          <h2><a href="product.php?id=<?= $id ?>"><?= htmlspecialchars($product['name']) ?></a></h2>
          <p class="product-price">€ <?= number_format($product['price'], 2, ',', '.') ?></p>
          <p><?= htmlspecialchars($product['description']) ?></p>
          <div class="product-actions"><a class="detail-link" href="product.php?id=<?= $id ?>">Bekijk specificaties</a><button class="add-to-cart" type="button" data-product="<?= $id ?>" data-name="<?= htmlspecialchars($product['name']) ?>" data-price="<?= $product['price'] ?>">Voeg toe aan winkelwagen</button></div>
        </div>
      </article>
    <?php endforeach; ?>
  </section>
  <?php include __DIR__ . "/includes/cart.php"; ?>
</main>
<?php include __DIR__ . "/includes/footer.php"; ?>
