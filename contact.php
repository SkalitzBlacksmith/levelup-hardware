<?php
require_once __DIR__ . '/includes/session.php';
$pageTitle = "Contact";
$pageDescription = "Stel je vraag over gaming hardware of onderhoud aan LevelUp Hardware.";
$activePage = "contact";
$name = $email = $subject = $message = "";
$errors = [];
$submitted = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = is_string($_POST["naam"] ?? null) ? trim($_POST["naam"]) : "";
    $email = is_string($_POST["email"] ?? null) ? trim($_POST["email"]) : "";
    $subject = is_string($_POST["onderwerp"] ?? null) ? trim($_POST["onderwerp"]) : "";
    $message = is_string($_POST["bericht"] ?? null) ? trim($_POST["bericht"]) : "";
    if ($name === "" || mb_strlen($name) > 80) $errors[] = "Vul een naam van maximaal 80 tekens in.";
    if (strlen($email) > 254 || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Vul een geldig e-mailadres in.";
    if ($subject === "" || mb_strlen($subject) > 100) $errors[] = "Vul een onderwerp van maximaal 100 tekens in.";
    if ($message === "" || mb_strlen($message) > 1000) $errors[] = "Vul een bericht van maximaal 1000 tekens in.";
    $token = is_string($_POST['token'] ?? null) ? $_POST['token'] : '';
    if (time() - ($_SESSION['last_contact'] ?? 0) < 30) $errors[] = 'Je hebt zojuist iets verstuurd. Wacht even voordat je opnieuw verstuurt.';
    if (!hash_equals($_SESSION['token'], $token)) $errors[] = "De sessie is verlopen. Probeer opnieuw.";
    if (!$errors) {
        try {
            require __DIR__ . '/includes/database.php';
            $query = $db->prepare('INSERT INTO contactberichten (naam, email, onderwerp, bericht) VALUES (?, ?, ?, ?)');
            $query->execute([$name, $email, $subject, $message]);
            $_SESSION['last_contact'] = time();
            $_SESSION['contact_sent'] = $name;
            $_SESSION['token'] = bin2hex(random_bytes(32));
            header('Location: contact.php?verstuurd=1', true, 303);
            exit;
        } catch (Throwable $exception) {
            http_response_code(503);
            error_log('Contact opslaan mislukt: ' . $exception->getMessage());
            $errors[] = "Je bericht kon niet worden opgeslagen. Probeer het later opnieuw.";
        }
    }
    if ($errors && http_response_code() !== 503) http_response_code(422);
}
if (isset($_GET['verstuurd'], $_SESSION['contact_sent'])) {
    $submitted = true;
    unset($_SESSION['contact_sent']);
}
include __DIR__ . "/includes/header.php";
?>
<main class="page-shell">
  <section class="page-hero"><h1 class="home-glow" data-text="Contact">Contact</h1><p class="hero-subtitle">We helpen je graag</p></section>
  <section class="content-grid contact-layout">
    <div><h2>Advies voor jouw setup</h2><p>Een vraag over onze gear, een upgrade of onderhoud? Vul het formulier in.</p><address>Terheijdenseweg 350<br>4826 AA Breda</address><a class="detail-link" href="over-ons.php">Bekijk de locatie</a></div>
    <div>
      <?php if ($submitted): ?>
        <h2>Bedankt!</h2><p>Je bericht is opgeslagen.</p>
        <a class="primary-button" href="contact.php">Nieuw bericht</a>
      <?php else: ?>
        <?php if ($errors): ?><div class="form-errors" role="alert"><ul><?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
        <form class="site-form" action="contact.php" method="post">
          <input type="hidden" name="token" value="<?= htmlspecialchars($_SESSION['token'], ENT_QUOTES, 'UTF-8') ?>">
          <label for="contact-name">Naam</label><input id="contact-name" name="naam" type="text" required maxlength="80" autocomplete="name" value="<?= htmlspecialchars($name) ?>">
          <label for="contact-email">E-mailadres</label><input id="contact-email" name="email" type="email" required maxlength="254" autocomplete="email" value="<?= htmlspecialchars($email) ?>">
          <label for="contact-subject">Onderwerp</label><input id="contact-subject" name="onderwerp" type="text" required maxlength="100" value="<?= htmlspecialchars($subject) ?>">
          <label for="contact-message">Bericht (maximaal 1000 tekens)</label><textarea id="contact-message" name="bericht" rows="6" required maxlength="1000"><?= htmlspecialchars($message) ?></textarea>
          <div class="form-actions"><button class="primary-button" type="submit">Verstuur bericht</button><button class="secondary-button" type="reset">Wis formulier</button></div>
        </form>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php include __DIR__ . "/includes/footer.php"; ?>
