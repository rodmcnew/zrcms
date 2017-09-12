<?php

namespace Zrcms\Acl\Api;

use Psr\Http\Message\ServerRequestInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class IsAllowedRelivServerEnvironmentNoneProduction implements IsAllowed
{
    /**
     * @param ServerRequestInterface $request
     * @param array                  $options
     *
     * @return bool
     */
    public function __invoke(
        ServerRequestInterface $request,
        array $options = []
    ): bool
    {
        return !\Reliv\Server\Environment::getInstance()->isProduction();
    }
}
