<?php

namespace Core;

class Route
{
    public $routes = [];

    public function addRoute($httpMethod, $uri, $controller, $middleware = null)
    {
        if (is_string($controller)) {
            $data = [
                'class' => $controller,
                'method' => '__invoke',
                'middleware' => $middleware
            ];
        }

        if(is_array($controller)) {
            $data = [
                'class' => $controller[0],
                'method' => $controller[1],
                'middleware' => $middleware
            ];
        }

        $this->routes[$httpMethod][$uri] = $data;
    }

    public function get($uri, $controller, $middleware = null)
    {
        $this->addRoute('GET', $uri, $controller, $middleware);

        return $this;
    }

    public function post($uri, $controller, $middleware = null)
    {
        $this->addRoute('POST', $uri, $controller, $middleware);

        return $this;
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

        $httpMethod = $_SERVER['REQUEST_METHOD'];

        $routeInfo = $this->routes[$httpMethod][$uri];

        if(! isset($routeInfo)){
            abort(404);
        }
        
        $class = $routeInfo['class'];
        $method = $routeInfo['method'];
        $middleware = $routeInfo['middleware'];

        if($middleware) {
            $m = new $middleware;
            $m->handle();
        }

        // dd($middleware);

        $c = new $class;
        $c->$method();
    }
}
