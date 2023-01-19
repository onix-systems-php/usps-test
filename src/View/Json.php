<?php

namespace App\View;

class Json implements ViewInterface
{

    public function __construct(
        protected array $data,
    ) {
    }

    public function render(): bool|string
    {
        header('Content-Type: application/json');
        return json_encode($this->data);
    }
}
