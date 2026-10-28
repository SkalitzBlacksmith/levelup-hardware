<?php
$databaseHost = getenv('LEVELUP_DB_HOST') ?: '127.0.0.1';
$databasePort = getenv('LEVELUP_DB_PORT') ?: '3306';
$databaseName = getenv('LEVELUP_DB_NAME') ?: 'levelup_hardware';
$databaseUser = getenv('LEVELUP_DB_USER') ?: 'root';
$databasePassword = getenv('LEVELUP_DB_PASSWORD') ?: '';
$db = new PDO("mysql:host=$databaseHost;port=$databasePort;dbname=$databaseName;charset=utf8mb4", $databaseUser, $databasePassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false]);
