<?php

namespace Core\HttpClient;

class Response implements ResponseInterface
{
    public function getHeaders(): array
    {
        // TODO: Implement getHeaders() method.
    }

    public function getCookies(): array
    {
        // TODO: Implement getCookies() method.
    }

    public function getCookie(string $cookieName): string
    {
        // TODO: Implement getCookie() method.
    }

    public function getHttpVersion(): string
    {
        // TODO: Implement getHttpVersion() method.
    }

    public function getBody(): string
    {
        // TODO: Implement getBody() method.
    }

    public function getStatusCode(): int
    {
        // TODO: Implement getStatusCode() method.
    }

    public function getStatusText(): string
    {
        // TODO: Implement getStatusText() method.
    }

    public function getPath(): string
    {
        // TODO: Implement getPath() method.
    }

    public function getQueryInPath(): string
    {
        // TODO: Implement getQueryInPath() method.
    }

    public function getFullPath(): string
    {
        // TODO: Implement getFullPath() method.
    }
}