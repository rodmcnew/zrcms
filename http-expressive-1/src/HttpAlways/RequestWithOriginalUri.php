<?php

namespace Zrcms\HttpExpressive1\HttpAlways;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class RequestWithOriginalUri
{
    const ATTRIBUTE_ORIGINAL_URI = 'zrcms-original-uri';

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
        callable $next = null
    ) {
        $request = $request
            ->withAttribute(self::ATTRIBUTE_ORIGINAL_URI, $request->getUri());

        return $next($request, $response);
    }
}
