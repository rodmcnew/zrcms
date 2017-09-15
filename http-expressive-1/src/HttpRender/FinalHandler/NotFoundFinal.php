<?php

namespace Zrcms\HttpExpressive1\HttpRender\FinalHandler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class NotFoundFinal
{
    /**
     * __invoke
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     * @param callable|null          $next
     *
     * @return ResponseInterface
     * @throws \Exception
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        $next = null
    ) {
        return $response->withAddedHeader('zrcms-final', 'NotFoundFinal')->withStatus(404);
    }
}