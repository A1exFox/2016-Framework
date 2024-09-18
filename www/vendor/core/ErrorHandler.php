<?php

namespace vendor\core;
use Throwable;
class ErrorHandler
{
    private static $errnames = array(
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
        set_error_handler([$this, 'errorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
        register_shutdown_function([$this, 'fatalErrorHandler']);
        ob_start();
//        require WWW . '/errors/errors_example.php';
    }
    public function exceptionHandler(Throwable $e)
    {
        $errcode = $e->getCode() ?: 503;
        $this->logError(get_class($e), $e->getMessage(), $e->getFile(), $e->getLine(), $errcode);
        ob_clean();
        $this->displayError(get_class($e), $e->getMessage(), $e->getFile(), $e->getLine(), $errcode);
        die;
    }
    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        $errtype = $this->getErrorName($errno);
        $this->logError($errtype, $errstr, $errfile, $errline);
        if (DEBUG) {
            ob_clean();
            $this->displayError($errtype, $errstr, $errfile, $errline);
            die;
        }
    }
    public function fatalErrorHandler()
    {
        if ($e = error_get_last() AND $e['type'] & (E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR)) {
            $errname = $this->getErrorName($e['type']);
            $this->logError($errname, $e['message'], $e['file'], $e['line'], 503);
            ob_clean();
            $this->displayError($errname, $e['message'], $e['file'], $e['line'], 503);
        }
        ob_end_flush();
    }
    private function displayError($errtype, $errstr, $errfile, $errline, $errcode = 200)
    {
        http_response_code($errcode);
        if (DEBUG || $errcode !== 404) {
            require WWW . '/errors/error.php';
        } else {
            require WWW . '/errors/404.php';
        }
    }
    private function logError($errtype, $errstr, $errfile, $errline, $errcode = 200)
    {
        $format = "[%s]: %s | Response code: %s\n - Message: %s\n - File: %s | Line: %s\n\n";
        $str = sprintf($format, date('Y-m-d H:i:s'), $errtype, $errcode, $errstr, $errfile, $errline);
        $dir = ROOT . '/tmp/logs';
        if (!is_dir($dir))
            mkdir($dir, 0777, true);
        if (is_dir($dir))
            error_log($str, 3, $dir . '/errors.log');
    }
    private function getErrorName($errno)
    {
        return self::$errnames[$errno] ?? 'UNDEFINED_ERROR';
    }
}