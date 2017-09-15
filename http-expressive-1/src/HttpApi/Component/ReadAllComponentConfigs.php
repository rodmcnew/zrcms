<?php

namespace Zrcms\HttpExpressive1\HttpApi\Component;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zrcms\HttpExpressive1\Model\JsonApiResponse;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ReadAllComponentConfigs
{
    const SOURCE = 'zrcms-get-register-components';

    /**
     * @var \Zrcms\Content\Api\Component\ReadAllComponentConfigs
     */
    protected $readAllComponentConfigs;

    /**
     * @param \Zrcms\Content\Api\Component\ReadAllComponentConfigs $readAllComponentConfigs
     */
    public function __construct(
        \Zrcms\Content\Api\Component\ReadAllComponentConfigs $readAllComponentConfigs
    ) {
        $this->readAllComponentConfigs = $readAllComponentConfigs; //$config['zrcms-components'];
    }

    /**
     * @param ServerRequestInterface            $request
     * @param ResponseInterface|JsonApiResponse $response
     * @param callable|null                     $next
     *
     * @return ResponseInterface
     * @throws \Exception
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) {
        $allComponentConfigs = $this->readAllComponentConfigs->__invoke();
        ksort($allComponentConfigs);
        return new JsonApiResponse(
            $allComponentConfigs
        );
    }
}
