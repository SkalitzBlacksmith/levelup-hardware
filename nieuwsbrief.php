<?php
$pageTitle = "Nieuwsbrief";
$activePage = "";
$name = "";
$email = "";
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = is_string($_POST["naam"] ?? null) ? trim($_POST["naam"]) : "";
    $email = is_string($_POST["email"] ?? null) ? trim($_POST["email"]) : "";
    if ($name === "" || strlen($name) > 80) $errors[] = "Vul een naam van maximaal 80 tekens in.";
    if (strlen($email) > 254 || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Vul een geldig e-mailadres in.";
    if (($_POST["toestemming"] ?? "") !== "1") $errors[] = "Geef toestemming voor de nieuwsbrief.";
} else {
    $errors[] = "Schrijf je eerst in via het nieuwsbriefformulier.";
}
if ($errors) http_response_code(422);
include __DIR__ . "/includes/header.php";
?>
<main class="page-shell thank-you">
  <?php if ($errors): ?>
    <h1>Controleer je inschrijving</h1>
    <div class="form-errors"><ul><?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error) ?></li><?php endforeach; ?></ul></div>
    <button class="primary-button" type="button" data-open-newsletter>Probeer opnieuw</button>
  <?php else: ?>
    <h1>Bedankt, <?= htmlspecialchars($name) ?>!</h1>
    <p><?= htmlspecialchars($name) ?>, je bent ingeschreven voor de nieuwsbrief.</p>
    <p>Je gebruikte e-mailadres: <?= htmlspecialchars($email) ?>.</p>
  <?php endif; ?>
  <a class="primary-button" href="index.php">Terug naar home</a>
</main>
<?php include __DIR__ . "/includes/footer.php"; ?>
