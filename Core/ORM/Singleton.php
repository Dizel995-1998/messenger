<?php

namespace Core\ORM;

abstract class Singleton
{
    protected static ?object $instance = null;

    public static function getInstance() : object
    {
        if (self::$instance == null) {
            self::$instance = new static();
        }
        return self::$instance;
    }
}