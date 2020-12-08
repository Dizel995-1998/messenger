<?php

namespace Core\HttpClient;

interface HttpResponseInterface
{
    public function getHeaders() : array;
    public function getCookies() : array;
    public function getVersion() : string;
    public function getBody() : string;
}