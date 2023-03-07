<?php 
    function controller($name){
        require __DIR__ . DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . 'controllers'   . DIRECTORY_SEPARATOR . $name;
    }
    function view($name){
        require __DIR__ . DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . 'views'   . DIRECTORY_SEPARATOR . $name;
    }
    function core($name){
        require __DIR__ . DIRECTORY_SEPARATOR . $name;
    }
    function base_location($name) {
        require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $name;
    }
    spl_autoload_register(function($class) {
        base_location(str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php');
    });
