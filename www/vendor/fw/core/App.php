<?php

namespace fw\core;

class App
{
    public static $app;

    public function __construct()
    {
        new ErrorHandler();
        self::$app = Registry::instance();
    }
}