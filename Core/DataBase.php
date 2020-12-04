<?php

namespace Core;

class DataBase
{
    protected static $pdo;

    protected static function getPDOconnection()
    {
        if (self::$pdo == null) {
            self::$pdo = new \PDO();
        }
        return self::$pdo;
    }

    /* Методы для работы с сообщениями */

    public static function editMessage(int $messageID, string $textMessage) : bool
    {

    }

    public static function deleteMessage(int $messageID) : bool
    {

    }

    /**
     * Записывает сообщение в базу данных, возвращает messageID записанного сообщения
     * @param int $userID
     * @param string $textMessage
     * @return int
     */
    public static function addNewMessage(int $userID, string $textMessage) : int
    {

    }

    public static function getMessage(int $limit) : array
    {

    }

    /* Методы для работы с пользователями */

    public static function editUser(int $userID, array $userField) : bool
    {

    }

    public static function deleteUser(int $userID)
    {

    }

    /**
     * Создаёт в БД запись нового пользователя, в случае успеха возвращает userID пользователя
     * @return int
     */
    public static function addNewUser() : int
    {

    }

    public static function getUserByUserID(int $userID)
    {

    }
}