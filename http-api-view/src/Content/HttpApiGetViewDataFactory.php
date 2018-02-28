<?php

namespace Zrcms\HttpApiView\Content;

use Psr\Container\ContainerInterface;
use Zrcms\Acl\Api\IsAllowedRcmUserSitesAdmin;
use Zrcms\CoreView\Api\GetViewByRequest;
use Zrcms\CoreView\Api\ViewToArray;
use Zrcms\Debug\IsDebug;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class HttpApiGetViewDataFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return HttpApiGetViewData
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        return new HttpApiGetViewData(
            $serviceContainer->get(GetViewByRequest::class),
            $serviceContainer->get(ViewToArray::class),
            404,
            400,
            [],
            IsDebug::invoke()
        );
    }
}
