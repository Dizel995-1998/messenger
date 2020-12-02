<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use Core\Router;
use Core\JWT;

require_once 'vendor/autoload.php';

Router::get('/hello/{id}/house/{id}', "TestController@show");