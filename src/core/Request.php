<?php

namespace Center\MiniFramework\Core;

class Request
{
    /*
     * Get the HTTP request method in lowercase, default to 'get'
     *  */
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD'] ?? 'get');
    }
    /*
     * Return the current Request path without query parameters
     * */
    public function path()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path,'?');
        if ($position !== false) {
            $path = substr($path, 0, $position);
        }
        return rtrim($path, '/') ?: '/';
    }
    /*
     * Get all GET request parameters.
     * */
    public function query()
    {
        return $_GET;
    }
    /*
     * Get all POST  request parameters.
     * */
    public function body()
    {
        return $_POST;
    }
   /*
   * Get all HTTP request headers.
   */
    public function headers()
    {
        if (function_exists('getallheaders')) {
            return getallheaders();
        }
        $headers = [];
        foreach ($_SERVER as $name => $value) {
            if (str_starts_with($name, 'HTTP_')) {
                $headerName = str_replace('_', '-', substr($name, 5));
                $headers[$headerName] = $value;
            }
        }
        return $headers;
    }

}