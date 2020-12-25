<?php


namespace Core\HttpClient;


class Request implements RequestInterface
{
    public function setCookie(array $cookies): void
    {
        // TODO: Implement setCookie() method.
    }

    public function setHttpVersion(string $version) : void
    {
        // TODO: Implement setHttpVersion() method.
    }

    public function setHeaders(array $headers) : void
    {
        // TODO: Implement setHeaders() method.
    }

    public function get(string $url) : ResponseInterface
    {
        // TODO: Implement get() method.
    }

    public function put(string $url, ?array $body = null) : ResponseInterface
    {
        // TODO: Implement put() method.
    }

    public function post(string $url, ?array $body = null) : ResponseInterface
    {
        // TODO: Implement post() method.
    }

    public function delete(string $url, ?array $body = null) : ResponseInterface
    {
        // TODO: Implement delete() method.
    }
}