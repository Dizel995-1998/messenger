<?php

namespace Controllers;

class TestController
{
    public function show($id, $houseID)
    {
        echo 'your ID: ' . $id . PHP_EOL;
        echo 'houseID: ' . $houseID;
    }
}