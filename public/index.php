<?php
require __DIR__ . '/../vendor/autoload.php';

if (!isset($_ENV['APP_SLUG'])) {
    (Dotenv\Dotenv::createImmutable(__DIR__ . '/..'))->load();
}

//test db connection
$pdo = new PDO(
    "pgsql:host={$_ENV['POSTGRES_HOSTNAME']};dbname={$_ENV['POSTGRES_DB_NAME']}",
    $_ENV['POSTGRES_USER'],
    $_ENV['POSTGRES_PASSWORD']
);
if ($pdo->query('SELECT 1')->fetchColumn()) {
    echo 'PG Connected';
} else {
    echo 'There has been an error with PG Connection';
}

//todo use /src files to run app