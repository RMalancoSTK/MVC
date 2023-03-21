<?php

class Config
{
    public static function getURL()
    {
        $folderPath = dirname($_SERVER['SCRIPT_NAME']);
        $urlPath = $_SERVER['REQUEST_URI'];
        return substr($urlPath, strlen($folderPath));
    }

    public static function getBaseUrl()
    {
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';
        $host     = $_SERVER['HTTP_HOST'];
        $script   = $_SERVER['SCRIPT_NAME'];
        $dir      = $_SERVER['SERVER_PORT'] == PORT ? rtrim(dirname($script), '/\\') : '';
        return $protocol . $host . $dir . '/';
    }
}
