<?php
$pageTitle = "Home";
$pageDescription = "High-end gaming gear, onderhoud en advies in Breda.";
$activePage = "index";
include __DIR__ . "/includes/header.php";
?>
  <main class="page-shell">
    <section class="page-hero">
      <h1 class="home-glow" data-text="High-end Gaming Gear">High-end Gaming Gear</h1>
      <p class="hero-subtitle">In Breda</p>
    </section>

    <section class="content-grid home-intro">
      <div class="copy-column">
        <p>Bij LevelUp Hardware draait alles om performance. Of je nu op zoek bent naar een nieuwe laptop die de nieuwste AAA-titels moeiteloos draait, of je huidige rig een professionele onderhoudsbeurt nodig heeft; wij staan voor je klaar.</p>
        <p>In onze fysieke winkel combineren we de nostalgische sfeer van de jaren '80 arcades met de brute kracht van de hardware van morgen.</p>
        <h2>Waarom kiezen voor ons?</h2>
      </div>
      <div class="laptop-visual">
        <img src="assets/laptop.webp" alt="Gaming laptop met rode gamevisual op het scherm" width="2000" height="1715">
      </div>
    </section>

    <section class="content-grid home-reasons">
      <div class="photo-frame store-photo">
        <img src="assets/storefront.png" alt="Daan in de LevelUp Hardware winkel in Breda" width="884" height="477">
      </div>
      <ul class="reasons-list">
        <li><strong>Curated Selectie:</strong> Wij verkopen alleen laptops waar we zelf achter staan. Geen concessies op bouwkwaliteit of koeling.</li>
        <li><strong>Expert Onderhoud:</strong> Van het vervangen van koelpasta tot complexe hardware-upgrades; wij verlengen de levensduur van je machine.</li>
        <li><strong>Persoonlijk advies:</strong> Geen standaard verkooppraatjes, maar eerlijk advies gebaseerd op jouw favoriete games en workflow.</li>
      </ul>
    </section>

    <section class="newsletter" id="nieuwsbrief">
      <div class="newsletter-copy">
        <h2>Blijf op de hoogte</h2>
        <p>Nieuwe gear, tips en updates van LevelUp Hardware.</p>
      </div>
      <div class="newsletter-action">
        <button class="newsletter-button" type="button" disabled>Schrijf je in voor de nieuwsbrief</button>
        <p>Inschrijven binnenkort beschikbaar!</p>
      </div>
    </section>
  </main>
</body>
</html>