<?php

namespace Core\Libs;

use PDO;

class DataBase
{
    private $pdo;
    private static $instance;

    private function __construct()
    {
        require_once 'core/config.php';
        $this->pdo = new PDO("mysql:host={$db['host']};dbname={$db['dbname']}", $db['user'], $db['password']);
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass')
    {
        $prep = $this->pdo->prepare($sql);
        $result = $prep->execute($params);
        
        if ($result === false) {
            return null;
        }
        
        return $prep->fetchAll(PDO::FETCH_CLASS, $className);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DataBase();
        }
        
        return self::$instance;
    }
}
