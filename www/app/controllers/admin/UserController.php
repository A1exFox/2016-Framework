<?php

namespace app\controllers\admin;

use fw\core\base\View;

class UserController extends AppController
{
    public $layout = 'default';
    public function indexAction()
    {
        View::setMeta('Admin panel | INDEX', 'Description admin panel', 'admin panel keys');
        $test = "TEST variable";
        $data = ['test' => '2'];
        $this->set(compact(['test', 'data']));
    }
    public function testAction()
    {
        $this->layout = 'admin';
    }
}