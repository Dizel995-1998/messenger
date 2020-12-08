<?php

namespace Core\HttpClient;

interface HttpRequestInterface
{
    public function setCookie(array $cookies) : void;
    public function setVersion(string $version) : void;
    public function setHeaders(array $headers) : void;
    public function sendRequest(string $method, string $url);
}