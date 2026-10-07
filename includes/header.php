<?php
$pageTitle = $pageTitle ?? "Home";
$pageDescription = $pageDescription ?? "Gaming hardware en persoonlijk advies in Breda.";
$activePage = $activePage ?? "";
?>
<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#24272c">
  <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
  <title><?= htmlspecialchars($pageTitle) ?> | LevelUp Hardware</title>
  <link rel="icon" href="favicon.svg" type="image/svg+xml">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Comfortaa:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="script.js" defer></script>
  <?php if (!empty($useCart)): ?><script src="cart.js" defer></script><?php endif; ?>

</head>
<body>
  <header class="site-header">
    <div class="header-inner">
      <a class="brand" href="index.php">
        <img src="assets/logo.png" alt="LevelUp Hardware" width="698" height="338">
      </a>
      <button class="menu-toggle" type="button" aria-label="Menu openen" aria-controls="main-nav" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
      <nav class="main-nav" id="main-nav">
        <ul>
          <li><a href="index.php" class="<?= $activePage === 'index' ? 'active' : '' ?>">Home</a></li>
          <li><a href="over-ons.php" class="<?= $activePage === 'over-ons' ? 'active' : '' ?>">Over ons</a></li>
          <li><a href="producten.php" class="<?= $activePage === 'producten' ? 'active' : '' ?>">Producten</a></li>
        </ul>
      </nav>
      <button class="theme-toggle" type="button" aria-pressed="false">Licht thema</button>
    </div>
  </header>

