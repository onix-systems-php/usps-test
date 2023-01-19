<?php

namespace Core\View;

interface ViewInterface
{
    public function render(): bool|string;
}
