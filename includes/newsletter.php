<dialog class="newsletter-modal" id="newsletter-modal" aria-labelledby="newsletter-title">
  <button class="modal-close" type="button" aria-label="Sluiten">&times;</button>
  <h2 id="newsletter-title">Blijf op de hoogte</h2>
  <p>Ontvang nieuwe gear, aanbiedingen en tips voor je setup.</p>
  <form action="nieuwsbrief.php" method="post" class="site-form">
    <label for="newsletter-name">Naam</label>
    <input id="newsletter-name" name="naam" type="text" required maxlength="80" autocomplete="name">
    <label for="newsletter-mail">E-mailadres</label>
    <input id="newsletter-email" name="email" type="email" required maxlength="254" autocomplete="email">
    <label class="checkbox-label"><input type="checkbox" name="toestemming" value="1" required> Ik wil de nieuwsbrief ontvangen.</label>
    <p class="form-note">Dit is een schooldemo. Je gegevens worden alleen voor de bedankpagina gebruikt; er wordt geen mail verstuurd.</p>
    <button class="primary-button" type="submit">Schrijf je in</button>
  </form>
</dialog>
