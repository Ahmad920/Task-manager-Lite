<?php

namespace app\core;

class Route
{
    private $get = [];
    private $post = [];

    public static function make()
    {

        $router = new self;



        return $router;
    }

    public function get($uri, $action)
    {
        $this->get[$uri] = $action;
        return $this;
    }

    public function post($uri, $action)
    {
        $this->post[$uri] = $action;
        return $this;
    }

    // public static function make($routes){

    //      self::$routes= $routes;



    //     return self::$routes;
    // }


    public function resolve($uri, $method)
    {
        if (array_key_exists($uri, $this->{$method})) {
            $action =  $this->{$method}[$uri];
            //var_dump($this->{$method}[$uri]);
            $this->callAction(...$action);
        } else {
            throw new \Exception('Page not Found');
        }
    }

    public function callAction($controller, $action)
    {
        // die(print_r(func_get_args()));
        $controller = new $controller; //create controller object
        //$method = $action[1];
        $controller->{$action}();
    }

    // public static function resolve($uri,$routes)
    // {
    //     if(array_key_exists($uri, $routes)){
    //         require $routes[$uri];
    //     } else {
    //         throw new Exception('Page not Found');
    //     }
    // }
}
