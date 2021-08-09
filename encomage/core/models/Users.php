<?php

namespace Core\Models;

use Core\Libs\DataBase;

class Users extends Model
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $create_date;
    public $update_date;

    private static $table = 'users';

    public static function getTable()
    {
        return self::$table;
    }

    public function add()
    {
        return $this->save($this, ['id', 'create_date', 'update_date']);
    }

    public function update()
    {
        $db = DataBase::getInstance();
        $db->query('UPDATE ' . $this->getTable() . ' SET update_date = CURRENT_TIMESTAMP WHERE id=:id', ['id' => $this->id], static::class);
        return $this->save($this, ['id', 'create_date', 'update_date']);
    }
}
