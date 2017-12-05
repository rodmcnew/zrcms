<?php

namespace Zrcms\Content\Api\Component;

use Zrcms\Content\Api\GetTypeValue;
use Zrcms\Content\Fields\FieldsComponent;
use Zrcms\Param\Param;
use Zrcms\ServiceAlias\Api\GetServiceFromAlias;
use Zrcms\ServiceAlias\ServiceCheck;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ReadComponentConfigByStrategy implements ReadComponentConfig
{
    protected $getServiceFromAlias;
    protected $configReaderServiceAliasNamespace;
    protected $defaultComponentConfigReaderServiceName;

    /**
     * @param GetServiceFromAlias $getServiceFromAlias
     * @param string              $configReaderServiceAliasNamespace
     * @param string              $defaultComponentConfigReaderServiceName
     */
    public function __construct(
        GetServiceFromAlias $getServiceFromAlias,
        string $configReaderServiceAliasNamespace,
        string $defaultComponentConfigReaderServiceName
    ) {
        $this->getServiceFromAlias = $getServiceFromAlias;
        $this->configReaderServiceAliasNamespace = $configReaderServiceAliasNamespace;
        $this->defaultComponentConfigReaderServiceName = $defaultComponentConfigReaderServiceName;
    }

    /**
     * @param string $location (directory or location)
     * @param array  $options
     *
     * @return array
     * @throws \Exception
     */
    public function __invoke(
        string $location,
        array $options = []
    ): array {
        $componentConfigReaderServiceAlias = Param::getString(
            $options,
            FieldsComponent::COMPONENT_CONFIG_READER,
            ''
        );

        /** @var ReadComponentConfig $readComponentConfig */
        $readComponentConfig = $this->getServiceFromAlias->__invoke(
            $this->configReaderServiceAliasNamespace,
            $componentConfigReaderServiceAlias,
            ReadComponentConfig::class,
            $this->defaultComponentConfigReaderServiceName
        );

        ServiceCheck::assertNotSelfReference($this, $readComponentConfig);

        $config = $readComponentConfig->__invoke(
            $location,
            $options
        );

        $config[FieldsComponent::COMPONENT_CONFIG_READER] = $componentConfigReaderServiceAlias;

        return $config;
    }
}
