<?php
namespace app\controllers;

use app\models\Main;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPMailer\PHPMailer\PHPMailer;
use R;
use fw\core\App;
use fw\core\base\View;

class MainController extends AppController
{
//    public $layout = 'main';
    public function indexAction()
    {
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler(ROOT . '/tmp/logs/monolog.log', Logger::WARNING));
//        $log->warning('Foo');
//        $log->error('Bar');

        $mailer = new PHPMailer();
//        var_dump($mailer);

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