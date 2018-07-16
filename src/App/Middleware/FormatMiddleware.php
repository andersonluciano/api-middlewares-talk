<?php

namespace App\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class FormatMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {

        $accept = $request->getHeader("Accept");

        switch ($accept) {
            case "application/json":
                return $delegate->process($request, $delegate);
                break;
            case "application/csv":

                break;

        }
    }
}
