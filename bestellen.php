<?php
require __DIR__ . '/includes/session.php';
require __DIR__ . '/includes/products.php';
$pageTitle = 'Bestelaanvraag';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = is_string($_POST['naam'] ?? null) ? trim($_POST['naam']) : '';
    $email = is_string($_POST['email'] ?? null) ? trim($_POST['email']) : '';
    $token = is_string($_POST['token'] ?? null) ? $_POST['token'] : '';
    $raw = is_string($_POST['producten'] ?? null) ? $_POST['producten'] : '';
    $items = strlen($raw) <= 4096 ? json_decode($raw, true) : null;
    if (time() - ($_SESSION['last_order'] ?? 0) < 30) $errors[] = 'Je hebt zojuist iets verstuurd. Wacht even voordat je opnieuw verstuurt.';
    if (!hash_equals($_SESSION['token'], $token)) $errors[] = 'De sessie is verlopen. Probeer opnieuw.';
    if ($name === '' || mb_strlen($name) > 80) $errors[] = 'Vul een geldige naam in.';
    if (strlen($email) > 254 || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Vul een geldig e-mailadres in.';
    if (!is_array($items) || !$items || count($items) > count($products)) $errors[] = 'De winkelwagen is leeg of ongeldig.';
    $order = []; $totalCents = 0;
    if (is_array($items)) foreach ($items as $id => $quantity) {
        if (!isset($products[$id]) || !is_int($quantity) || $quantity < 1 || $quantity > 99) { $errors[] = 'Een product of aantal is ongeldig.'; break; }
        $product = $products[$id];
        $order[] = ['product' => $product['name'], 'aantal' => $quantity, 'prijs' => $product['price']];
        $totalCents += (int) round($product['price'] * 100) * $quantity;
    }
    if (!$errors) {
        try {
            require __DIR__ . '/includes/database.php';
            $query = $db->prepare('INSERT INTO bestellingen (naam, email, producten, totaal) VALUES (?, ?, ?, ?)');
            $query->execute([$name, $email, json_encode($order, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR), $totalCents / 100]);
            $_SESSION['last_order'] = time();
            $_SESSION['order_sent'] = ['name' => $name, 'id' => $db->lastInsertId()];
            $_SESSION['token'] = bin2hex(random_bytes(32));
            header('Location: bestellen.php?verstuurd=1', true, 303); exit;
        } catch (Throwable $exception) { error_log('Bestelling opslaan mislukt: ' . $exception->getMessage()); http_response_code(503); $errors[] = 'Je aanvraag kon niet worden opgeslagen. Probeer het later opnieuw.'; }
    }
} elseif (isset($_GET['verstuurd'], $_SESSION['order_sent'])) {
    $receipt = $_SESSION['order_sent']; unset($_SESSION['order_sent']); $sent = true;
} else { header('Location: producten.php', true, 303); exit; }
if ($errors) http_response_code(422);
include __DIR__ . '/includes/header.php';
?>
<main class="page-shell thank-you">
<?php if (!empty($sent)): ?><h1>Aanvraag ontvangen</h1><p>Bedankt, <?= htmlspecialchars($receipt['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>. Je aanvraagnummer is <?= (int) $receipt['id'] ?>.</p><p>Je bestelaanvraag is opgeslagen. Dit is een voorbeeldassortiment; er is geen betaling gedaan.</p><span id="order-sent" hidden></span>
<?php else: ?><h1>Controleer je aanvraag</h1><div class="form-errors" role="alert"><ul><?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<a class="primary-button" href="producten.php">Terug naar producten</a></main>
<?php include __DIR__ . '/includes/footer.php'; ?>
