<?php

namespace Core\HttpClient;

interface ResponseInterface
{
    public function getHeaders() : array;
    public function getCookies() : array;
    public function getCookie(string $cookieName) : string;
    public function getHttpVersion() : string;
    public function getBody() : string;
    public function getStatusCode() : int;
    public function getStatusText() : string;
    public function getPath() : string;
    public function getQueryInPath() : string;
    public function getFullPath() : string;
}