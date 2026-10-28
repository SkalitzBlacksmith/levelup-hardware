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
$search = is_string($_GET["zoek"] ?? null) ? trim($_GET["zoek"]) : "";
$sort = is_string($_GET["sort"] ?? null) ? $_GET["sort"] : "naam";
if (!in_array($sort, ["naam", "laag", "hoog"], true)) $sort = "naam";
if ($search !== "") {
    $visibleProducts = array_filter($visibleProducts, function ($product) use ($search) {
        return stripos($product["name"] . " " . $product["description"], $search) !== false;
    });
}
uasort($visibleProducts, function ($a, $b) use ($sort) {
    if ($sort === "laag") return $a["price"] <=> $b["price"];
    if ($sort === "hoog") return $b["price"] <=> $a["price"];
    return strcmp($a["name"], $b["name"]);
});
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
  <form class="product-filters site-form" action="producten.php" method="get">
    <input type="hidden" name="categorie" value="<?= htmlspecialchars($category) ?>">
    <div><label for="search">Zoek gear</label><input id="search" name="zoek" type="search" value="<?= htmlspecialchars($search) ?>" placeholder="Bijvoorbeeld laptop"></div>
    <div><label for="sort">Sorteer op</label><select id="sort" name="sort"><option value="naam" <?= $sort === 'naam' ? 'selected' : '' ?>>Naam</option><option value="laag" <?= $sort === 'laag' ? 'selected' : '' ?>>Prijs: laag naar hoog</option><option value="hoog" <?= $sort === 'hoog' ? 'selected' : '' ?>>Prijs: hoog naar laag</option></select></div>
    <button class="primary-button" type="submit">Zoeken</button><a class="detail-link" href="producten.php">Wis filters</a>
  </form>
  <?php if (!$visibleProducts): ?><p>Geen producten gevonden. Probeer een andere zoekterm.</p><?php endif; ?>
  <p class="product-count"><?= count($visibleProducts) ?> producten</p>
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
