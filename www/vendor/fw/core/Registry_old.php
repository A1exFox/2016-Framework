<?php

namespace fw\core;

class Registry
{
    use TSingletone;
    public static $objects = [];
    protected function __construct()
    {
        require_once ROOT . '/config/config.php';
        foreach ($config['components'] as $name => $component) {
            self::$objects[$name] = new $component;
        }
    }
    public function __get($name)
    {
       if (is_object(self::$objects[$name]))
           return self::$objects[$name];
       return null;
    }
    public function __set($name, $object)
    {
        if (!isset(self::$objects[$name]))
            self::$objects[$name] = new $object;
    }
    public function getList()
    {
        echo '<pre>';
        var_dump(self::$objects);
        echo '</pre>';
    }
}