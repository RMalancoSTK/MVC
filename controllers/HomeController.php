<?php
class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Utils::setJsScript($this->jsScript, '../assets/js/home.js', true);
    }

    public function dashboard()
    {
        $this->loadView("home/dashboard");
    }
}
