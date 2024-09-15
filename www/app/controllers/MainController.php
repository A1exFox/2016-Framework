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
        $post = R::findOne('posts', 'id = 2');
        $menu = $this->menu;
//        $this->setMeta($post->title, $post->description, $post->keywords);
        $this->setMeta('Index', 'Description index', 'Keywords index');
        $meta = $this->meta;
        $this->set(compact('posts', 'menu', 'meta'));
    }
    public function testAction()
    {
        $this->layout = 'test';
    }
}