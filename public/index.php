<?php
require __DIR__ . '/../vendor/autoload.php';

if (!isset($_ENV['APP_SLUG'])) {
    (Dotenv\Dotenv::createImmutable(__DIR__ . '/..'))->load();
}

//test db connection
$pdo = new PDO(
    "{$_ENV['DATABASE_DRIVER']}:host={$_ENV['DATABASE_HOST']};dbname={$_ENV['DATABASE_NAME']}",
    $_ENV['DATABASE_USER'],
    $_ENV['DATABASE_PASSWORD']
);
if ($pdo->query('SELECT 1')->fetchColumn()) {
    echo 'PG Connected';
} else {
    echo 'There has been an error with PG Connection';
}

//todo use /src files to run app