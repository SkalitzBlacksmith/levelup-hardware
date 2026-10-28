<?php
$settingsFile = dirname(__DIR__, 3) . '/private/levelup-database.php';
$settings = is_file($settingsFile) ? require $settingsFile : [];
$databaseHost = getenv('LEVELUP_DB_HOST') ?: ($settings['host'] ?? '127.0.0.1');
$databasePort = getenv('LEVELUP_DB_PORT') ?: ($settings['port'] ?? '3306');
$databaseName = getenv('LEVELUP_DB_NAME') ?: ($settings['name'] ?? 'levelup_hardware');
$databaseUser = getenv('LEVELUP_DB_USER') ?: ($settings['user'] ?? 'root');
$databasePassword = getenv('LEVELUP_DB_PASSWORD') ?: ($settings['password'] ?? '');
$db = new PDO("mysql:host=$databaseHost;port=$databasePort;dbname=$databaseName;charset=utf8mb4", $databaseUser, $databasePassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false]);
