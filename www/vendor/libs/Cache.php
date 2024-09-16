<?php

namespace vendor\libs;

class Cache
{
    public function __construct()
    {

    }
    public function set($key, $data, $seconds = 3600) {
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        $filename = CACHE . '/' . md5($key) . '.txt';

        if (!is_dir(CACHE))
            mkdir(CACHE, 0777, true);

        if (file_put_contents($filename, serialize($content))) {
            return true;
        }
        return false;
    }
    public function get($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if (time() < $content['end_time']) {
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }
    public function delete($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file))
            unlink($file);
    }
}