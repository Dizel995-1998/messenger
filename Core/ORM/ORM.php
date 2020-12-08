<?php

namespace Core\ORM;
use PDO;

require_once 'Singleton.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


class ORM extends Singleton
{
    CONST DB_DRIVER = 'mysql';
    CONST DB_NAME = 'chat';
    CONST DB_HOST = 'localhost';
    CONST DB_USER = 'root';
    CONST DB_PASSWORD = 'root';

    private string $query;
    private object $pdo;

    protected function __construct()
    {
        $this->pdo = new PDO(
            sprintf('%s:host=%s;dbname=%s', self::DB_DRIVER, self::DB_HOST, self::DB_NAME),
            self::DB_USER, self::DB_PASSWORD);
    }

    public function select(array $fields) : ORM
    {
        $this->query = 'SELECT ';
        foreach ($fields as $field) {
            $this->query .= $field;
        }
        return $this;
    }

    public function from(array $tables) : ORM
    {
        $this->query .= ' FROM ';
        foreach ($tables as $table) {
            $this->query .= $table;
        }
        return $this;
    }

    public function where(array $fields) : ORM
    {
        $this->query .= ' WHERE ';
        foreach ($fields as $field => $value) {
            $this->query .= $field . $value;
        }
        return $this;
    }

    public function execute()
    {
        return $this->pdo->query($this->query)->fetch();
    }
}

$orm = ORM::getInstance();
$result = $orm->select(['user_name'])->from(['users'])->execute();
print_r($result);