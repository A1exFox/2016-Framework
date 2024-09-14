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
//        $post = $model->findOne(2);
//        $data = $model->findBySql("SELECT * FROM posts ORDER BY id DESC LIMIT 2");
//        $data = $model->findBySql("SELECT * FROM {$model->table} WHERE title LIKE ?", ['%se%']);
        $data = $model->findByLike('se', 'title');
        debug($data);
        $title = 'Page title';
        $this->set(compact('title', 'posts'));
    }
}