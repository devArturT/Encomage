<?php

namespace Core\Libs;

class View
{
    public static function render(string $path, array $data = [], int $code = 200)
    {
        http_response_code($code);
        extract($data);
        unset($data);

        require_once 'core/views/header.php';
        require_once 'core/views/' . $path . '.php';
        require_once 'core/views/footer.php';
    }
}
