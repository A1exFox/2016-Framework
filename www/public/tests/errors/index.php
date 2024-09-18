<?php
define('DEBUG', 1);
class NotFoundException extends Exception {
    public function __construct(string $message = "", int $code = 404)
    {
        parent::__construct($message, $code);
    }
}
class ErrorHandler {
    private static $nameErrors = array(
        E_ERROR => 'E_ERROR',
        E_WARNING => 'E_WARNING',
        E_PARSE => 'E_PARSE',
        E_NOTICE => 'E_NOTICE',
        E_CORE_ERROR => 'E_CORE_ERROR',
        E_CORE_WARNING => 'E_CORE_WARNING',
        E_COMPILE_ERROR => 'E_COMPILE_ERROR',
        E_COMPILE_WARNING => 'E_COMPILE_WARNING',
        E_USER_ERROR => 'E_USER_ERROR',
        E_USER_WARNING => 'E_USER_WARNING',
        E_USER_NOTICE => 'E_USER_NOTICE',
        E_STRICT => 'E_STRICT',
        E_RECOVERABLE_ERROR => 'E_RECOVERABLE_ERROR',
        E_DEPRECATED => 'E_DEPRECATED',
        E_USER_DEPRECATED => 'E_USER_DEPRECATED',
    );
    public function __construct()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', DEBUG);
        set_error_handler([$this,'error_handler']);
        set_exception_handler([$this, 'exception_handler']);
        register_shutdown_function([$this, 'fatal_error_handler']);
        ob_start();
    }
    public function error_handler($errno, $errstr, $errfile, $errline)
    {
        if (DEBUG) {
            ob_clean();
            $this->display_error('Error', $errno, $errstr, $errfile, $errline);
            die;
        }
        return true;
    }
    public function exception_handler(Throwable $e)
    {
        $errcode = $e->getCode() ?: 503;
        ob_clean();
        $this->display_error('Exception', E_ERROR, $e->getMessage(), $e->getFile(), $e->getLine(), $errcode);
        die;
    }
    public function fatal_error_handler()
    {
        if ($error = error_get_last() AND $error['type'] & (E_ERROR | E_COMPILE_ERROR | E_CORE_ERROR | E_PARSE)) {
            ob_clean();
            $this->display_error(
                'Fatal error',
                $error['type'],
                $error['message'],
                $error['file'],
                $error['line']);
        }
        ob_end_flush();
    }
    function display_error($errtype, $errno, $errstr, $errfile, $errline, $errcode = 503)
    {
        http_response_code($errcode);
        if (!DEBUG && $errcode === 404) {
            require __DIR__ . '/views/404.php';
        } else {
            $errname = self::$nameErrors[$errno] ?? self::$nameErrors[E_ERROR];
            require __DIR__ . '/views/error.php';
        }
    }
}
new ErrorHandler();
require 'errors.php';