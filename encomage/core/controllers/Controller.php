<?php

namespace Core\Controllers;

abstract class Controller
{
    function redirect(string $path)
    {
        header('Location: ' . $path);
        exit;
    }
}
