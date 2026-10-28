<?php
require_once __DIR__ . '/includes/session.php';
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
    $token = is_string($_POST['token'] ?? null) ? $_POST['token'] : '';
    if (time() - ($_SESSION['last_newsletter'] ?? 0) < 30) $errors[] = 'Je hebt zojuist iets verstuurd. Wacht even voordat je opnieuw verstuurt.';
    if (!hash_equals($_SESSION['token'], $token)) $errors[] = "De sessie is verlopen. Probeer opnieuw.";
    if (!$errors) {
        try {
            require __DIR__ . '/includes/database.php';
            $query = $db->prepare('INSERT INTO nieuwsbrief (naam, email) VALUES (?, ?) ON DUPLICATE KEY UPDATE naam = ?');
            $query->execute([$name, strtolower($email), $name]);
            $_SESSION['last_newsletter'] = time();
            $_SESSION['newsletter_sent'] = $name;
            $_SESSION['token'] = bin2hex(random_bytes(32));
            header('Location: nieuwsbrief.php?verstuurd=1', true, 303);
            exit;
        } catch (Throwable $exception) {
            error_log('Nieuwsbrief opslaan mislukt: ' . $exception->getMessage());
            $errors[] = "Je inschrijving kon niet worden opgeslagen. Probeer het later opnieuw.";
        }
    }
} elseif (isset($_GET['verstuurd'], $_SESSION['newsletter_sent'])) {
    $subscriber = $_SESSION['newsletter_sent'];
    unset($_SESSION['newsletter_sent']);
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
    <h1>Bedankt, <?= htmlspecialchars($subscriber, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>!</h1>
    <p>Je bent ingeschreven voor de nieuwsbrief.</p>
  <?php endif; ?>
  <a class="primary-button" href="index.php">Terug naar home</a>
</main>
<?php include __DIR__ . "/includes/footer.php"; ?>
