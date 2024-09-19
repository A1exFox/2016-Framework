<?php
namespace app\controllers;

use app\models\Main;
use R;
use vendor\core\App;
use vendor\core\base\View;

class MainController extends AppController
{
//    public $layout = 'main';
    public function indexAction()
    {
        new Main();
        $posts = R::findAll('posts');
        $menu = $this->menu;
        View::setMeta('Index title', 'Description text', 'Keywords set');
        $this->set(compact('posts', 'menu'));
    }
    public function testAction()
    {
        if ($this->isAjax()) {
            new Main();
//            $data = ['answer' => 'Server response', 'code' => '200'];
//            echo json_encode($data);
            $post = R::findOne('posts', 'id = ?', [$_POST['id']]);
            $this->loadView('_test', compact('post'));
            die();
        }
        $this->layout = 'test';
    }
}