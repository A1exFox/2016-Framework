<?php
function debug($arr)
{
    echo '<pre>'.print_r($arr, true).'</pre>';
}

function redirect($http = false)
{
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = $_SERVER['HTTP_REFERER'] ?? '/';
    }
    header("Location: $redirect");
    exit;
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function __($key)
{
    echo \fw\core\base\Lang::get($key);
}