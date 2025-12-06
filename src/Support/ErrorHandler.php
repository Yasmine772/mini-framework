<?php

namespace Center\MiniFramework\Support;

use Center\MiniFramework\Core\Response;
use Center\MiniFramework\Core\View;

class ErrorHandler
{
    /**
     * Not found
     */
    public static function handle404(Response $res)
    {
        $res->setStatusCode(404);
        $html = View::render('errors/404');
        $res->setBody($html);
        return $res->sendMessage();
    }

    /**
     * Internal server error
     */
    public static function handleException(\Throwable $e, Response $res): void
    {
        $res->setStatusCode(500);
        $html = View::render('errors/500');
        $res->setBody($html);
        $res->sendMessage();

    }
}
