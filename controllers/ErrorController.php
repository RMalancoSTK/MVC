<?php

class ErrorController extends Controller
{
    private $messageerror;

    public function __construct()
    {
        parent::__construct();
        $this->messageerror = '';
    }

    public function index()
    {
        $this->validateError();
        $this->loadView('error/index');
    }

    public function setError404($messageerror)
    {
        $this->messageerror = $messageerror;
    }

    public function getError404()
    {
        return $this->messageerror;
    }

    private function validateError()
    {
        if (empty($this->messageerror)) {
            header(LOCATION_DEFAULT);
        }
    }
}
