<?php

namespace fw\core\base;

class View
{
    public $route = [];
    public $view;
    public $layout;
    public $scripts = '';
    public static $meta = ['title' => '', 'desc' => '', 'keywords' => ''];
    public function __construct($route, $layout = '', $view = '') {
        $this->route = $route;
        if ($layout === false)
            $this->layout = false;
        else
            $this->layout = $layout ?: LAYOUT;
        $this->view = $view;
    }

    protected function compressPage($buffer)
    {
        $pattern[] = "#<!--.+?-->#";
        $replace[] = "";

        $pattern[] = "#>\s+<#";
        $replace[] = "><";

        $pattern[] = "#  +#";
        $replace[] = " ";

        return preg_replace($pattern, $replace, $buffer);
//        return $buffer;
    }

    public function render($vars)
    {
        extract($vars);
        $this->route['prefix'] = str_replace('\\', '/', $this->route['prefix']);
        $file_view = APP . "/views/{$this->route['prefix']}{$this->route['controller']}/{$this->view}.php";
        ob_start([$this, 'compressPage']);
//        ob_start('ob_gzhandler');
//        header('Content-Encoding: gzip');
        if (is_file($file_view))
            require $file_view;
        else
            throw new \Exception("View file <b>$file_view</b> is not found", 404);
        $content = ob_get_contents();
        ob_clean();
        if ($this->layout !== false) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)) {
                $content = $this->getScript($content);
                require $file_layout;
            } else {
                throw new \Exception("layout file <b>$file_layout</b> is not found", 404);
            }
        } else {

        }
        ob_end_flush();
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
    public static function getMeta()
    {
        echo '<title>' . self::$meta['title'] . '</title>
    <meta name="description" content="' . self::$meta['desc'] . '">
    <meta name="keywords" content="' . self::$meta['keywords'] . '">' . PHP_EOL;
    }
    public static function setMeta($title = '', $desc = '', $keywords = '')
    {
        self::$meta['title'] = $title;
        self::$meta['desc'] = $desc;
        self::$meta['keywords'] = $keywords;
    }
}