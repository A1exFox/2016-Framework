<?php
namespace app\controllers;

use app\models\Main;
use R;
use vendor\core\App;

class MainController extends AppController
{
//    public $layout = 'main';
    public function indexAction()
    {
        $model = new Main();
        $posts = R::findAll('posts');
        $menu = $this->menu;
        $this->setMeta('Index', 'Description index', 'Keywords index');
        $meta = $this->meta;
        $this->set(compact('posts', 'menu', 'meta'));
    }
    public function testAction()
    {
        if ($this->isAjax()) {
            echo 'content from post[' . $_POST['id'] . ']';
            die();
        }
        $this->layout = 'test';
    }
}