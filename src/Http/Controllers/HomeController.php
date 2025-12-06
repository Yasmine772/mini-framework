<?php

namespace Center\MiniFramework\Http\Controllers;

use Center\MiniFramework\Core\Request;
use Center\MiniFramework\Core\Response;
use Center\MiniFramework\Core\View;
use Center\MiniFramework\Support\ErrorHandler;

class HomeController
{
    public function index(Request $request, Response $response)
    {
        try {
            $html = View::render('Home/home');
            $response->setBody($html);
            return $response->sendMessage();
        } catch (\Throwable $e) {
            return ErrorHandler::handleException($e, $response);
        }
    }
}
