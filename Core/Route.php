<?php

namespace Core;

class Route
{
    public $routes = [];

    public function addRoute($httpMethod, $uri, $controller)
    {
        if (is_string($controller)) {
            $data = [
                'class' => $controller,
                'method' => '__invoke'
            ];
        }

        if(is_array($controller)) {
            $data = [
                'class' => $controller[0],
                'method' => $controller[1]
            ];
        }

        $this->routes[$httpMethod][$uri] = $data;
    }

    public function get($uri, $controller)
    {
        $this->addRoute('GET', $uri, $controller);

        return $this;
    }

    public function post($uri, $controller)
    {
        $this->addRoute('POST', $uri, $controller);

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

        $c = new $class;
        $c->$method();
    }
}
