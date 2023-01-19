<?php

namespace Core;

use Core\Routing\Router;
use Core\View\ViewInterface;
use Core\View\Template;
use Core\View\Json;

class Application
{

    private string $url;

    public function __construct(private readonly Router $router)
    {
        $this->url = $_SERVER['REQUEST_URI'];
    }

    public function run(): void
    {
        try {
            $matchedRoute = $this->router->getMatchedRoute($this->url);
            $controller = new $matchedRoute->controller();
            $result = $controller->{$matchedRoute->action}(...$matchedRoute->parameters);
            if ($result instanceof ViewInterface) {
                echo $result->render();
            } else {
                echo (new Json($result))->render();
            }
        } catch (\Throwable $e) {
            echo (new Template('error', ['message' => $e->getMessage()]))->render();
        }
    }
}
