<?php
namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
//    public $layout = 'main';
    public function indexAction()
    {
        $model = new Main();
        $posts = $model->findAll();
        $posts = $model->findAll();
        $title = 'Page title';
        $this->set(compact('title', 'posts'));
    }
}