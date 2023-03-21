<?php
function controllersAutoload($classnames)
{
    if (file_exists('controllers/' . $classnames . '.php')) {
        require_once 'controllers/' . $classnames . '.php';
    } elseif (file_exists('models/' . $classnames . '.php')) {
        require_once 'models/' . $classnames . '.php';
    } elseif (file_exists('database/' . $classnames . '.php')) {
        require_once 'database/' . $classnames . '.php';
    } elseif (file_exists('helpers/' . $classnames . '.php')) {
        require_once 'helpers/' . $classnames . '.php';
    } elseif (file_exists('config/' . $classnames . '.php')) {
        require_once 'config/' . $classnames . '.php';
    } elseif (file_exists('routers/' . $classnames . '.php')) {
        require_once 'routers/' . $classnames . '.php';
    } elseif (file_exists('core/' . $classnames . '.php')) {
        require_once 'core/' . $classnames . '.php';
    } elseif (file_exists('auth/' . $classnames . '.php')) {
        require_once 'auth/' . $classnames . '.php';
    }
}
spl_autoload_register('controllersAutoload');
