<?php

namespace Core;

use Exception;

class Router
{
    private array $allowMethods = ['get', 'post', 'put', 'delete'];
    private string $method;
    private string $path;

    public function __construct() //HttpRequest $httpRequest)
    {

    }

    private function preparePattern(string $pattern) : string
    {
        return '~^' . preg_replace('~({[a-zA-Z]+})~', '(\d+)', $pattern) . '~';
    }

    private function runController($controller, array $params) : void
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

    protected function request(string $method, string $pathPattern, $controller)
    {
        if (
            $this->method == $method &&
            preg_match($this->preparePattern($pathPattern), $this->path, $matches))
        {
            $this->runController($controller, $matches);
        }
    }

    public function __call($method, $arguments)
    {
        if (!in_array($method, $this->allowMethods)) {
            throw new Exception('Dont support this method ' . $method);
        }

        $this->request($method, $arguments[0], $arguments[1]);
    }
}