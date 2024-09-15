<?php

namespace app\controllers;

class PageController extends AppController
{
    public function viewAction()
    {
        $menu = $this->menu;
        $title = 'View Page';
        $this->set(compact(['title', 'menu']));
    }
}