<?php
namespace app\controllers;

use app\models\Main;
use R;

class MainController extends AppController
{
//    public $layout = 'main';
    public function indexAction()
    {
//        $model = new Main();
        $posts = R::findAll('posts');
        $menu = $this->menu;
//        $this->test();
        $title = 'Page title';
        $this->set(compact('title', 'posts', 'menu'));
    }
}