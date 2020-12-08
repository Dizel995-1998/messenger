<?php

namespace Core\HttpClient;

interface ResponseInterface
{
    public function getHeaders() : array;
    public function getCookies() : array;
    public function getVersion() : string;
    public function getBody() : string;
    public function getCode() : int;
    public function getStatusCode() : string;
    public function getPath() : string;
    public function getQueryInPath() : string;
    public function getFullPath() : string;
}