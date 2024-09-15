<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\base\Controller;

class AppController extends Controller
{
    public $menu;
    public $meta = [];
    public function __construct($route)
    {
        parent::__construct($route);
        if ($route['action'] !== 'test') {
            new Main();
            $this->menu = \R::findAll('category');
        }
    }

    protected function setMeta($title = '', $description = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $description;
        $this->meta['keywords'] = $keywords;
    }
}