<?php
namespace app\controllers;

class Main extends App
{
//    public $layout = 'main';
    public function indexAction()
    {
//        $this->layout = false;
//        $this->layout = 'default';
//        $this->view = 'test';
        $name = "Jerry";
        $hi = "hello";
        $colors = array('#000', '#fff', '#0f0');
        $title = 'Page title';
        $this->set(compact('name', 'hi', 'colors', 'title'));
    }
}