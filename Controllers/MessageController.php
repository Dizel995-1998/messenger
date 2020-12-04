<?php

namespace Controllers;

use Core\DataBase;

class MessagesController
{
    public function getMessage(int $limit = 1000)
    {
        header('Content-Type: Application/json');
        return json_encode(DataBase::getAllMessages(false), JSON_UNESCAPED_UNICODE);
    }

    public function addNewMessage()
    {

    }

    public function deleteMessage(int $messageID)
    {

    }

    public function editMessage(int $messageID, string $messageText)
    {

    }
}