<?php

namespace fw\core;

class App
{
    public static $app;

    public function __construct()
    {
        session_start();
        new ErrorHandler();
        self::$app = Registry::instance();
    }
}