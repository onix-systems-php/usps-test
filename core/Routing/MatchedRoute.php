<?php

namespace Core\Routing;

class MatchedRoute
{
    public function __construct(
        public string $controller,
        public string $action,
        public array $parameters,
    ) {
    }
}
