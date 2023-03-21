<?php

class Router extends Controller
{
    private $controller;
    private $method;

    public function __construct()
    {
        $this->matchRoute();
        $this->initData();
    }

    private function showError($messageerror)
    {
        $error = new ErrorController();
        $error->setError404($messageerror);
        $error->index();
    }

    public function matchRoute()
    {
        $url = explode("/", URL);
        // Verificar si el índice 2 existe antes de intentar acceder a él
        $met = isset($url[2]) ? explode("?", $url[2]) : [];
        $this->controller = $url[1];
        $this->method = isset($met[0]) ? $met[0] : '';
        $this->controller = $this->controller . "Controller";
        // Verificar si el controlador existe
        if (!class_exists($this->controller)) {
            $this->showError("Error 404: Controlador no encontrado");
            return;
        }
        // Verificar si el método existe
        if (!method_exists($this->controller, $this->method)) {
            $this->showError("Error 404: Método no encontrado");
            return;
        }
        require_once("controllers/" . $this->controller . ".php");
    }

    public function run()
    {
        // corrección: debemos de comprobar si el controlador existe antes de instanciarlo
        if (class_exists($this->controller)) {
            $controller = new $this->controller();
            // corrección: debemos de comprobar si el método existe antes de ejecutarlo
            if (method_exists($controller, $this->method)) {
                $method = $this->method;
                if (isset($this->request)) {
                    $controller->$method($this->request);
                } else {
                    $controller->$method();
                }
            } else {
                $this->showError("Error 404: Método no encontrado");
                exit;
            }
        }
    }
}
