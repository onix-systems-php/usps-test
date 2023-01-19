<?php

namespace App\Routing;

class Router
{
    public array $routes = [];

    public function addRoute(Route $route): void
    {
        $this->routes[] = $route;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function getMatchedRoute(string $url): MatchedRoute
    {
        foreach ($this->routes as $route) {
            $matchedRoute = $route->match($url);
            if (!is_null($matchedRoute)) {
                return $matchedRoute;
            }
        }
        throw new \Exception('Not Found');
    }
}
