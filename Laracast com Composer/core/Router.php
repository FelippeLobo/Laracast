<?php

    namespace App\Core;
 

    class Router{

        public $routes = [

            'GET' => [],

            'POST' => []

        ];

        public static function load($file){

            $router = new static;

            require $file;

            return $router;
        }

        public function get($uri, $controller){

            $this->routes['GET'][$uri] = $controller;
        }

        
        public function post($uri, $controller){

            $this->routes['POST'][$uri] = $controller;
        }

        public function define($routes){

            $this->routes = $routes;
        }

        public function direct($uri, $requestType){

            if( array_key_exists($uri, $this->routes[$requestType])){
                
                //return $this->routes[$requestType][$uri];

                
                return $this->callAction(

                    ...explode('@', $this->routes[$requestType][$uri])

                );
            }
            dd($uri, $requestType);
            throw new \Exception('Nenhuma rota encontrada para esse URI.');

        }

        protected function callAction($controller, $action){

            $controller = "App\\Controllers\\{$controller}";


            $controller = new $controller;


            if( ! method_exists($controller, $action )){

                throw new Exception ("Essa função não existe.");
            }
            return $controller->$action();
        }

    }