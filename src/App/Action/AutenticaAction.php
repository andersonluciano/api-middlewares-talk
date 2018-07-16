<?php

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class AutenticaAction extends AbstractApiAction
{
    public function get(ServerRequestInterface $request)
    {

        return new JsonResponse(["ok"]);
    }

    public function post(ServerRequestInterface $request)
    {

        return new JsonResponse(["ok"]);
    }
}
