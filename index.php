<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'vendor/autoload.php';


$token = \Core\JWT::generateToken(['hello' => '123'], ['data' => 'info']);
$tokenFake = 'eyJoZWxsbyI6IjEyMyJ9.eyJkYXRhIjoiaW5mbyJ9.a109cf0bd358704783553c6fd12d19f4092086c37dfacd303d533511a812777b';
var_dump(\Core\JWT::verificationToken($tokenFake));
