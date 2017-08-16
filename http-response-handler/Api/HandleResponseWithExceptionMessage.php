<?php

namespace Zrcms\HttpResponseHandler\Api;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zrcms\HttpResponseHandler\Model\HandleResponseOptions;
use Zrcms\Param\Param;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class HandleResponseWithExceptionMessage implements HandleResponse
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     * @param callable|null          $next
     * @param array                  $options
     *
     * @return mixed
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null,
        array $options = []
    ) {
        $exception = Param::get(
            $options,
            HandleResponseOptions::EXCEPTION
        );

        if ($exception instanceof \Exception) {
            return new HtmlResponse(
                $exception->getMessage(),
                $response->getStatusCode(),
                $response->getHeaders()
            );
        }

        return $response;
    }
}
