<?php

namespace Core\Libs;

use Core\Exceptions\DataBaseException;
use Core\Exceptions\NotFoundException;
use Exception;

class Route
{
    private static $url;

    public static function start()
    {
        try {
            self::$url = $_GET['url'] ?? '/';
            $routes = require_once 'routes/web.php';
            $matches = [];

            foreach ($routes as $reg => $value) {
                $pattern = "~^$reg/?$~";

                if (preg_match($pattern, self::$url, $matches) == 1) {
                    self::$url = $reg;
                    break;
                }
            }

            if (count($matches) == 0) {
                throw new NotFoundException();
            }

            if (!is_array($routes[self::$url])) {
                die('Route invalid');
            }

            list($nameController, $nameMethod) = $routes[self::$url];

            if (!file_exists("core/controllers/{$nameController}.php")) {
                die('Controller ' . $nameController . ' not found.');
            }

            $pathController = 'Core\\Controllers\\' . $nameController;
            $controller = new $pathController();

            if (!method_exists($controller, $nameMethod)) {
                die('Method (' . $nameController . ') ' . $nameMethod . ' not found');
            }

            $controller->$nameMethod($matches[1] ?? null);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        } catch (NotFoundException $e) {
            View::render('errors/404', [], 404);
            exit;
        }
    }
}
