<?php

use Core\ORM;

class QueryBuilder
{
    private static ?object $instance = null;

    private static function getPDOconnection()
    {
        if (self::$instance == null) {
            //self::$instance = new PDO();
        }
        return self::$instance;
    }

    /**
     * Операция чтения таблицы
     * @param string $tableName
     * @param int $id
     * @return array
     */
    public static function select(string $tableName, int $id) : array
    {
        return ['id' => $id, 'name' => 'shamil', 'login' => 'dizel', 'password' => '123'];
    }

    /**
     * Операция записи в таблицу
     * @param string $tableName
     * @param array $fields
     * @param int|null $id
     * @return bool
     */
    public static function insert(string $tableName, array $fields, ?int &$id) : bool
    {
        return true;
    }

    /**
     * @param string $tableName
     * @param int $id
     * @param array $fields
     * @return bool
     */
    public static function update(string $tableName, int $id, array $fields) : bool
    {
        return true;
    }

    /**
     * @param string $tableName
     * @param int $id
     * @return bool
     */
    public static function delete(string $tableName, int $id) : bool
    {
        return true;
    }
}
