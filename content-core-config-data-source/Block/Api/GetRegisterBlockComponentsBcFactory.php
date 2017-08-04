<?php

namespace Zrcms\ContentCoreConfigDataSource\Block\Api;

use Psr\Container\ContainerInterface;
use Zrcms\Cache\Service\Cache;
use Zrcms\ContentCore\Block\Api\PrepareBlockConfigBc;
use Zrcms\ContentCore\Block\Api\ReadBlockComponentConfigBc;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class GetRegisterBlockComponentsBcFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return GetRegisterBlockComponentsBc
     */
    public function __invoke(
        $serviceContainer
    ) {
        $config = $serviceContainer->get('config');

        $registryConfig = $config['zrcms']['blocks'];

        $registryConfigBc = $config['rcmPlugin'];

        return new GetRegisterBlockComponentsBc(
            $registryConfig,
            $registryConfigBc,
            $serviceContainer->get(ReadBlockComponentConfigBc::class),
            $serviceContainer->get(Cache::class),
            $serviceContainer->get(PrepareBlockConfigBc::class)
        );
    }
}
