<?php

namespace App\View;

class Template implements ViewInterface
{

    public function __construct(
        protected string $template,
        protected array $data,
        protected string $layout = 'default',
        protected array $layoutData = [],
    ) {
    }

    public function render(): bool|string
    {
        header('Content-Type: text/html; charset=utf-8');
        $templateContent = $this->getTemplateContent();
        return $this->getLayoutContent(is_string($templateContent) ? $templateContent : '');
    }

    private function getTemplateContent(): bool|string
    {
        extract($this->data);
        ob_start();
        include(DIR_TEMPLATES . $this->template . '.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    private function getLayoutContent(string $content): bool|string
    {
        extract($this->layoutData);
        ob_start();
        include(DIR_LAYOUTS . $this->layout . '.php');
        $layoutContent = ob_get_contents();
        ob_end_clean();
        return $layoutContent;
    }

}
