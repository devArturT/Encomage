<?php

namespace Core\Models;

use Core\Exceptions\NotFoundException;
use Core\Libs\DataBase;
use ReflectionObject;

abstract class Model
{
    public static function all()
    {
        $db = DataBase::getInstance();

        return $db->query('SELECT * FROM ' . static::getTable(), [], static::class);
    }

    public static function find($id)
    {
        $db = DataBase::getInstance();
        $result = $db->query('SELECT * FROM ' . static::getTable() . ' WHERE id=:id', ['id' => $id], static::class);

        return $result ? $result[0] : null;
    }

    public static function findOrFail($id)
    {
        $item = self::find($id);
        if ($item == null) {
            throw new NotFoundException();
        }
        return $item;
    }

    public static function remove_($props, $remove)
    {
        $temp = [];
        array_push($remove, 'table');

        foreach ($props as $p) {
            if (!in_array($p, $remove)) {
                array_push($temp, $p);
            }
        }

        return $temp;
    }

    public static function getProperties_($class)
    {
        $reflector = new ReflectionObject($class);
        $properties = $reflector->getProperties();
        $props = [];

        foreach ($properties as $p) {
            $props[] = $p->name;
        }

        return $props;
    }

    public static function addElement_($arr, $element)
    {
        $temp = [];

        foreach ($arr as $i) {
            array_push($temp, $element . $i);
        }

        return $temp;
    }

    public function save($model_example, $removed_params)
    {
        $par =  static::remove_(static::getProperties_($model_example), $removed_params);
        $temp_p = implode(',', static::addElement_($par, ':'));
        $sql = '';

        if ($this->id) {
            $new_arr = [];

            foreach ($par as $p) {
                $new_arr[] = $p . '=:' . $p;
            }

            $sql = 'UPDATE ' . static::getTable() . ' SET ' . implode(',', $new_arr) . ' WHERE id=' . $this->id;
        } else {
            $sql = 'INSERT INTO ' . static::getTable() . '(' . implode(',', $par) . ') VALUES(' . $temp_p . ')';
        }

        $db = DataBase::getInstance();
        $t_params = [];

        foreach ($par as $p) {
            $t_params[$p] = $model_example->$p;
        }

        return $db->query($sql, $t_params);
    }

    abstract public static function getTable();
}
