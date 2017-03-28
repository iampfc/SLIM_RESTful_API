<?php
error_reporting(E_ALL^E_NOTICE);
class router
{
    public $version;
    public $slim;
    public $db;

    public function __construct()
    {
        require '../slim/vendor/slim.php';
        $this->slim = new Slim\App();
        $className = explode('/',$_SERVER['REQUEST_URI'])[1];
        $this->loadClass($className);
    }

    public function loadClass($class = '')
    {
        if(!class_exists($class)) require "../class/class.$class.php";
    }

    function run()
    {
        $this->slim->run();
    }
}

$router = new router();
$router->run();
