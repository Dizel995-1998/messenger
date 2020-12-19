<?php

use Core\ORM;

class QueryBuilder
{
    CONST DB_NAME = '';
    CONST DB_HOST = '';
    CONST DB_USER = '';
    CONST DB_PASSWORD = '';

    private static ?object $instance = null;

    private static function getPDOconnection()
    {
        if (self::$instance == null) {
            /*
             * $connection = sprintf('mysql:dbname=%s;host=%s;charset=utf8', self::DB_NAME, self::DB_HOST);
             * self::$instance = new PDO($connection, self::DB_USER, self::DB_PASSWORD);
             */
        }
        return self::$instance;
    }

    /**
     * Операция чтения таблицы, возвращает ассоциативный массив с ключами полей и их значениями
     * @param string $tableName
     * @param int $id
     * @return array
     */
    public static function select(string $tableName, int $id) : array
    {
        /*
         * $stmt = self::getPDOconnection()->prepare('SELECT * FROM ' . $tableName . ' WHERE id = :id');
         * $stmt->execute([':id' => $id]);
         * $result = $stmt->fetch(PDO::FETCH_ASSOC);
         */
        return ['id' => $id, 'name' => 'shamil', 'login' => 'dizel', 'password' => '123'];
    }

    /**
     * Операция записи в таблицу, возвращает id последней добавленной записи через аргумент id
     * возвращает true в случае успеха, false в случае некорректного выполнения операции
     * @param string $tableName
     * @param array $fields
     * @param int|null $id
     * @return bool
     */
    public static function insert(string $tableName, array $fields, ?int &$id) : bool
    {
        $id = 12;
        return true;
    }

    /**
     * @param string $tableName
     * @param int $id
     * @param array $fields
     * @return bool
     */
    public static function update(string $tableName, array $fields, int $id) : bool
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
