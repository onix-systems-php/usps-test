<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../constants.php';

use App\Controllers\HomeController;
use Core\Application;
use Core\Routing\Route;
use Core\Routing\Router;

if (!isset($_ENV['APP_SLUG'])) {
    (Dotenv\Dotenv::createImmutable(__DIR__ . '/..'))->load();
}

$router = new Router();
$router->addRoute(new Route('/', HomeController::class, 'index'));
$router->addRoute(new Route('/validate', HomeController::class, 'validate'));
$router->addRoute(new Route('/save', HomeController::class, 'save'));
$app = new Application($router);
$app->run();
