<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../constants.php';

use Core\Application;
use Core\Routing\Route;
use Core\Routing\Router;
use App\Controllers\HomeController;

if (!isset($_ENV['APP_SLUG'])) {
    (Dotenv\Dotenv::createImmutable(__DIR__ . '/..'))->load();
}

$router = new Router();
$router->addRoute(new Route('/', HomeController::class, 'index'));
$app = new Application($router);
$app->run();