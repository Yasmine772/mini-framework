<?php

namespace Center\MiniFramework\Core;

class Router
{
    private $routes = [];

    public function get(string $path,array $handler): void
    {
       $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path,array $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function resolve(Request $request,Response $response)
    {
        $method = strtoupper($request->method());
       $path = $request->path();
       $routerInfo = $this->match($method,$path);
        if(! $routerInfo)
        {
            $html = View::render('errors/404');

            $response->setStatusCode(404);
            $response->setBody($html);
            return $response->sendMessage();
        }
        [$handler,$params]=$routerInfo;
        [$controllerClass,$controllerMethod]=$handler;

        $controller = new $controllerClass();

        return call_user_func_array([$controller,$controllerMethod],
            array_merge($params,[$request,$response])
        );

    }

    private function match(string $method, string $path)
    {
       $routes = $this->routes[$method] ?? [];

       foreach($routes as $routePath => $routeHandler)
       {
           // /users/{id} => /users/{(\w+)}
           $pattern = preg_replace('/\{(\w+)\}/','([^/]+)',$routePath);
           // #^/users/(\w+)$#
           $pattern = '#^' . $pattern . '$#';
           if(preg_match($pattern,$path,$matches))
           {
               array_shift($matches);
               return [$routeHandler, $matches];
           }
       }
        return false;
    }
}