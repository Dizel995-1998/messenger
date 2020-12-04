<?php

namespace Core;

class AbstractController
{
    protected $httpService;

    public function __construct()
    {
        //$this->httpService = new HttpClient();
    }
}