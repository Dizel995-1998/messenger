<?php

namespace Core\HttpClient;

interface RequestInterface
{
    public function setCookie(array $cookies) : void;
    public function setHttpVersion(string $version) : void;
    public function setHeaders(array $headers) : void;
    public function get(string $url) : ResponseInterface;
    public function put(string $url, ?array $body = null) : ResponseInterface;
    public function post(string $url, ?array $body = null) : ResponseInterface;
    public function delete(string $url, ?array $body = null) : ResponseInterface;
}