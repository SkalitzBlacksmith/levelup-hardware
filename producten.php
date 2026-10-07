<?php
$pageTitle = "Producten";
$pageDescription = "Gaming laptops, desktops en accessoires voor jouw setup.";
$activePage = "producten";
$useCart = true;
include __DIR__ . "/includes/header.php";
?>
  <main class="page-shell">
    <section class="page-hero">
      <h1 class="home-glow" data-text="Producten">Producten</h1>
      <p class="hero-subtitle">Voor de Serieuze Gamer</p>
    </section>

    <section class="product-list">
      <article class="product-row">
        <div class="photo-frame product-photo">
          <img src="assets/laptop.webp" alt="Gaming Laptop X1 met rode gamevisual" width="2000" height="1715">
        </div>
        <div class="product-copy">
          <h2>Gaming Laptop X1</h2>
          <p class="product-price">€1499</p>
          <p>Krachtige laptop met de nieuwste GPU voor ultieme gaming prestaties.</p>
          <button class="add-to-cart" type="button" data-product="laptop">Voeg toe aan winkelwagen</button>
        </div>
      </article>

      <article class="product-row">
        <div class="photo-frame product-photo">
          <img src="assets/pc.png" alt="Custom Gaming PC met verlichte ventilatoren" width="2000" height="2000">
        </div>
        <div class="product-copy">
          <h2>Custom Gaming PC</h2>
          <p class="product-price">€1999</p>
          <p>Op maat gemaakte desktop met topkwaliteit componenten voor maximale snelheid.</p>
          <button class="add-to-cart" type="button" data-product="pc">Voeg toe aan winkelwagen</button>
        </div>
      </article>

      <article class="product-row">
        <div class="photo-frame product-photo">
          <img src="assets/headset.webp" alt="Zwarte Pro Gaming Headset met microfoon" width="680" height="680">
        </div>
        <div class="product-copy">
          <h2>Pro Gaming Headset</h2>
          <p class="product-price">€199</p>
          <p>Comfortabele headset met surround sound voor een meeslepende game-ervaring.</p>
          <button class="add-to-cart" type="button" data-product="headset">Voeg toe aan winkelwagen</button>
        </div>
      </article>
    </section>

    <section class="cart" id="winkelwagen">
      <h2>Winkelwagen</h2>
      <p class="cart-empty">Je winkelwagen is nog leeg.</p>
      <ul class="cart-items"></ul>
      <p class="cart-total">Totaal: <strong>€ 0,00</strong></p>
    </section>
  </main>
</body>
</html>