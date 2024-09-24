<?php
namespace app\controllers;

use app\models\Main;
use fw\core\App;
use fw\libs\Pagination;
use R;
use fw\core\base\View;

class MainController extends AppController
{
//    public $layout = 'main';
    public function indexAction()
    {
//        new Main();

        $lang = App::$app->getProperty('lang')['code'];
        $total  = R::count('posts', "lang_code = ?", [$lang]);
//        debug($total);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perpage = 2;

        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $posts = R::findAll('posts', "lang_code = ? LIMIT $start, $perpage", [$lang]);
        View::setMeta('Blog | Index', 'Description text', 'Keywords set');
        $this->set(compact('posts', 'pagination', 'total'));
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