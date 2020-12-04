<?php

namespace Core;

use Exception;

class Router
{
    protected static function getHttpMethod()
    {
        return 'GET';
    }

    protected static function getHttpPath()
    {
        return '/hello/123/house/321';
    }

    private static function preparePattern(string $pattern) : string
    {
        return '~^' . preg_replace('~({[a-zA-Z]+})~', '(\d+)', $pattern) . '~';
    }

    private static function runController($controller, array $params) : void
    {
        array_shift($params);
        if (is_callable($controller)) {
            echo call_user_func_array($controller, $params);
        } else if (is_string($controller)) {
            $arController = explode('@', $controller);
            $controllerClass = "\Controllers\\" . $arController[0];
            $controllerAction = $arController[1];
            $controllerObject = new $controllerClass();
            echo call_user_func_array(array($controllerObject, $controllerAction), $params);
        } else {
            throw new Exception('Controller must be string or callable function');
        }
    }

    protected static function request(string $method, string $pathPattern, $controller)
    {
        if (
            self::getHttpMethod() == $method &&
            preg_match(self::preparePattern($pathPattern), self::getHttpPath(), $matches))
        {
            self::runController($controller, $matches);
        }
    }

    public static function get(string $pathPattern, $controller)
    {
        self::request('GET', $pathPattern, $controller);
    }

    public static function post(string $pathPattern, $controller)
    {
        self::request('POST', $pathPattern, $controller);
    }

    public static function delete(string $pathPattern, $controller)
    {
        self::request('DELETE', $pathPattern, $controller);
    }

    public static function put(string $pathPattern, $controller)
    {
        self::request('PUT', $pathPattern, $controller);
    }
}