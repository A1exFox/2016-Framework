<?php

namespace app\controllers;

use app\models\Main;
use fw\core\App;
use fw\core\base\Controller;
use fw\widgets\language\Language;

class AppController extends Controller
{
    public $menu;
    public $meta = [];
    public function __construct($route)
    {
        parent::__construct($route);
        new Main();
        $langs = Language::getLanguages();
        App::$app->setProperty('langs', $langs);

        $lang = Language::getLanguage($langs);
        App::$app->setProperty('lang', $lang);

        debug(App::$app->getProperties());
    }

    protected function setMeta($title = '', $description = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $description;
        $this->meta['keywords'] = $keywords;
    }
}