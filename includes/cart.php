<section class="cart" id="winkelwagen" aria-label="Winkelwagen">
  <h2>Winkelwagen <span class="cart-count">0</span></h2>
  <p class="cart-empty">Je winkelwagen is nog leeg.</p>
  <ul class="cart-items"></ul>
  <p class="cart-total">Totaal: <strong>€ 0,00</strong></p>
  <form class="site-form" action="bestellen.php" method="post" id="order-form">
    <input type="hidden" name="token" value="<?= htmlspecialchars($_SESSION['token'], ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" name="producten" id="order-products">
    <label for="order-name">Naam</label><input id="order-name" name="naam" maxlength="80" autocomplete="name" required>
    <label for="order-email">E-mailadres</label><input id="order-email" name="email" type="email" maxlength="254" autocomplete="email" required>
    <button class="primary-button" type="submit">Bestelaanvraag versturen</button>
    <p class="form-note">Je bestelaanvraag wordt opgeslagen; er vindt geen betaling plaats.</p>
  </form>
</section>
