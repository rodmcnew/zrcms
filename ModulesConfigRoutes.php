<?php

namespace Zrcms;

use Zend\ConfigAggregator\ConfigAggregator;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModulesConfigRoutes
{
    public function __invoke()
    {
        $zrcmsModules = [
            new \Zrcms\HttpApi\ModuleConfigRoutes(),
            new \Zrcms\HttpApiContainer\ModuleConfigRoutes(),
            new \Zrcms\HttpApiCountry\ModuleConfigRoutes(),
            new \Zrcms\HttpApiLanguage\ModuleConfigRoutes(),
            new \Zrcms\HttpApiPage\ModuleConfigRoutes(),
            new \Zrcms\HttpApiRedirect\ModuleConfigRoutes(),
            new \Zrcms\HttpApiSite\ModuleConfigRoutes(),
            new \Zrcms\HttpApiTheme\ModuleConfigRoutes(),
            new \Zrcms\HttpApiView\ModuleConfigRoutes(),
            new \Zrcms\HttpAssets\ModuleConfigRoutes(),
            new \Zrcms\HttpAssetsAdminTools\ModuleConfigRoutes(),
            new \Zrcms\HttpAssetsApplicationState\ModuleConfigRoutes(),
            new \Zrcms\HttpAssetsChangeLog\ModuleConfigRoutes(),

            // @todo HttpTest should NOT be included by default
            new \Zrcms\HttpTest\ModuleConfigRoutes(),
        ];

        $configManager = new ConfigAggregator(
            $zrcmsModules
        );

        return $configManager->getMergedConfig();
    }
}