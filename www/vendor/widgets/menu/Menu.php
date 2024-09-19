<?php

namespace vendor\widgets\menu;

use vendor\core\App;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'categories';
    protected $cache = 3600;
    protected $cache_key = 'fw_menu';
    public function __construct($options)
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';

        $this->getOptions($options);
        $this->run();
    }
    protected function getOptions($options)
    {
        foreach ($options as $key => $value) {
            if (property_exists($this, $key))
                $this->$key = $value;
        }
    }
    protected function output()
    {
        echo "<{$this->container} class=\"{$this->class}\">";
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }
    protected function run()
    {
        $this->menuHtml = App::$app->cache->get($this->cache_key);
        if (!$this->menuHtml) {
            $this->data = \R::getAssoc("SELECT * FROM {$this->table}");
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            App::$app->cache->set($this->cache_key, $this->menuHtml, $this->cache);
        }
        $this->output();
    }
    protected function getTree()
    {
        $tree = array();
        $data = $this->data;
        foreach ($data as $id => &$node) {
            if (!$node['parent']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }
    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }
    protected function catToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

}