<?php

namespace Center\MiniFramework\Core;

class view
{
    public static function render(string $template, $data = []): bool|string
    {
        $templatePath = __DIR__ . '/../../views/pages/' . $template . '.php';
        $layoutPath =   __DIR__ . '/../../views/layouts/app.php';
        if (!file_exists($templatePath)) {
            return "Not found template $templatePath";
        }
        extract($data);
        ob_start();
        include $templatePath;
        $content = ob_get_clean();

        ob_start();
        include $layoutPath;
        return ob_get_clean();
    }

}




