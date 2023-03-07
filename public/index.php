<?php 
    use Core\Router;
    require('../core/functions.php');
    // GET URI
    $request_uri    =   parse_url($_SERVER['REQUEST_URI'])['path'];
    // GET REQUEST METHOD
    $request_method =   isset($_POST['_method'])   ?   $_POST['_method']    :   $_SERVER['REQUEST_METHOD'];
    echo '<pre>';
    var_dump($request_method);
    echo '</pre>';
    var_dump($request_uri);
    //CALL ROUTER
    $router =   new Router();
    //SET ROUTES
    require('../routes.php');
    // LOAD REQUIRED CONTROLLER
    $router->route($request_uri, $request_method);
