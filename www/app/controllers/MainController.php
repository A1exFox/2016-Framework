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
//        $model = new Main();
        R::fancyDebug(true);
        $posts = App::$app->cache->get('posts');
        if ($posts === false) {
            $posts = R::findAll('posts');
            App::$app->cache->set('posts', $posts);
        }
//        $posts = R::findAll('posts');
//        App::$app->cache->set('posts', $posts, 3600 * 24);
//        echo date('Y-m-d H:i') . '<br>';
//        echo date('Y-m-d H:i', 1726483371) . '<br>';
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