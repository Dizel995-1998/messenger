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

    /**
     * Запускает контроллер
     * @param $controller - enum type - callable, string
     * @param array $params
     * @return string
     * @throws Exception
     */
    private function runController($controller, array $params) : string
    {
        array_shift($params);

        if (is_callable($controller)) {
            return call_user_func_array($controller, $params);
        }

        if (is_string($controller)) {
            if (strpos($controller, '@') === false) {
                throw new Exception('Controller type string must consist @ symbol delimiter');
            }

            $arController = explode('@', $controller);
            $controllerClass = "\Controllers\\" . $arController[0];
            $controllerAction = $arController[1];
            $controllerObject = new $controllerClass();
            return call_user_func_array(array($controllerObject, $controllerAction), $params);
        }
        throw new Exception('Controller must be string or callable type');
    }

    protected function request(string $method, string $pathPattern, $controller) : ?string
    {
        return $this->method == $method &&
        preg_match($this->preparePattern($pathPattern), $this->path, $matches) ?
                $this->runController($controller, $matches) : null;
    }

    public function __call($method, $arguments)
    {
        if (!in_array($method, $this->allowMethods)) {
            throw new Exception('Dont support this method ' . $method);
        }

        if (count($arguments) != 1) {
            throw new Exception('Not right args count');
        }

        $this->request($method, $arguments[0], $arguments[1]);
    }
}