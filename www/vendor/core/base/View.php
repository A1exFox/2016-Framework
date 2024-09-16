<?php

namespace vendor\core\base;

class View
{
    public $route = [];
    public $view;
    public $layout;
    public $scripts = '';
    public function __construct($route, $layout = '', $view = '') {
        $this->route = $route;
        if ($layout === false)
            $this->layout = false;
        else
            $this->layout = $layout ?: LAYOUT;
        $this->view = $view;
    }
    public function render($vars)
    {
        extract($vars);
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view))
            require $file_view;
        else
            echo "<p>File view: <b>$file_view</b> is not found</p>";
        $content = ob_get_clean();
        if ($this->layout !== false) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)) {
                $content = $this->getScript($content);
                require $file_layout;
            } else {
                echo "<p>File layout: <b>$file_layout</b> is not found</p>";
            }
        } else {

        }
    }

    protected function getScript($content)
    {
        $pattern = '#<script.*?>.*?</script>#si';
        $matches;
        if (false !== preg_match_all($pattern, $content, $matches))
            $content = preg_replace($pattern, '', $content);
        $this->scripts = implode("\n", $matches[0]) . "\n";
        return $content;
    }
}