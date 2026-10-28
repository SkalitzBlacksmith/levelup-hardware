<dialog class="newsletter-modal" id="newsletter-modal" aria-labelledby="newsletter-title">
  <button class="modal-close" type="button" aria-label="Sluiten">&times;</button>
  <h2 id="newsletter-title">Blijf op de hoogte</h2>
  <p>Ontvang nieuwe gear, aanbiedingen en tips voor je setup.</p>
  <form action="nieuwsbrief.php" method="post" class="site-form">
    <input type="hidden" name="token" value="<?= htmlspecialchars($_SESSION['token'], ENT_QUOTES, 'UTF-8') ?>">
    <label for="newsletter-name">Naam</label>
    <input id="newsletter-name" name="naam" type="text" required maxlength="80" autocomplete="name">
    <label for="newsletter-email">E-mailadres</label>
    <input id="newsletter-email" name="email" type="email" required maxlength="254" autocomplete="email">
    <label class="checkbox-label"><input type="checkbox" name="toestemming" value="1" required> Ik wil de nieuwsbrief ontvangen.</label>
    <p class="form-note">Je inschrijving wordt opgeslagen. Er worden op dit moment geen nieuwsbrieven verstuurd.</p>
    <button class="primary-button" type="submit">Schrijf je in</button>
  </form>
</dialog>
