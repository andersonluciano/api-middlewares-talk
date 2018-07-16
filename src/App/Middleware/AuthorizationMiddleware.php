<?php

namespace App\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class AuthorizationMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $auth = $request->getHeader("Authorization");

        if ($auth[0] != "tdc2018") {
            return new JsonResponse(["exception" => "Acesso não autorizado"], 401);
        } else {
            try {
                return $delegate->process($request, $delegate);
            } catch (\Exception $e) {
                return new JsonResponse(array("exception" => $e->getMessage(), "statusCode" => $e->getCode()), $e->getCode() != 0 ? $e->getCode() : 400);
            }
        }
    }
}
