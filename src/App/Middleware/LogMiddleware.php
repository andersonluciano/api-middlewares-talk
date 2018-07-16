<?php

namespace App\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class LogMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {

        $requestResume = [
            "method" => $request->getMethod(),
            "body" => $request->getParsedBody(),
            "query" => $request->getQueryParams(),
            "headers" => $request->getHeaders(),
        ];

        /** @var JsonResponse $response */
        $response = $delegate->process($request, $delegate);
        $requestResume['response'] = $response->getBody()->getContents();
        $requestResume['status-code'] = $response->getStatusCode();
        file_put_contents("/tmp/mylog.log", date("d-m-Y H:i:s") . "\n", print_r($requestResume, 1) . "\n\n", FILE_APPEND);

        return $response;
    }
}
