<?php 
namespace Core;

class Router{
    private $routes =   [];
    private function add_to_routes($method, $uri, $controller){
        $this->routes[$uri]  =   [
            'uri'   => $uri,
            'controller'   => $controller,
            'method'   => $method,
        ];
    }
    private function abort($error_code  =   404){
        http_response_code($error_code);
        view('error_views/404.view.php');
    }
    public function get($uri, $controller){
        $this->add_to_routes('GET', $uri, $controller);
    }
    public function post($uri, $controller){
        $this->add_to_routes('POST', $uri, $controller);
    }
    public function delete($uri, $controller){
        $this->add_to_routes('DELETE', $uri, $controller);
    }
    public function put($uri, $controller){
        $this->add_to_routes('PUT', $uri, $controller);
    }

    public function route($uri, $method){
        if (array_key_exists($uri, $this->routes)){
            if($this->routes[$uri]['uri']   === $uri && $this->routes[$uri]['method']   === strtoupper($method)){
                controller($this->routes[$uri]['controller']);
            }else{
                $this->abort();
            }
        } else {
            $this->abort();
        }
        
    }
}
?>