<?php

namespace Zrcms\Content\Api\Component;

use Psr\Container\ContainerInterface;
use Zrcms\Content\Api\GetTypeValue;
use Zrcms\Content\Fields\FieldsComponentConfig;
use Zrcms\Content\Model\Component;
use Zrcms\Content\Model\ComponentBasic;
use Zrcms\Param\Param;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class BuildComponentObjectByStrategy implements BuildComponentObject
{
    protected $serviceContainer;
    protected $getTypeValue;
    protected $defaultBuildComponentObject;
    protected $defaultComponentClass;

    /**
     * @param ContainerInterface $serviceContainer
     * @param GetTypeValue       $getTypeValue
     * @param string             $defaultBuildComponentObject
     * @param string             $defaultComponentClass
     */
    public function __construct(
        $serviceContainer,
        GetTypeValue $getTypeValue,
        string $defaultBuildComponentObject = BuildComponentObjectDefault::class,
        string $defaultComponentClass = ComponentBasic::class
    ) {
        $this->serviceContainer = $serviceContainer;
        $this->getTypeValue = $getTypeValue;
        $this->defaultBuildComponentObject = $defaultBuildComponentObject;
        $this->defaultComponentClass = $defaultComponentClass;
    }

    /**
     * @param array $componentConfig
     * @param array $options
     *
     * @return Component
     */
    public function __invoke(
        array $componentConfig,
        array $options = []
    ): Component {
        $type = Param::getString(
            $componentConfig,
            FieldsComponentConfig::TYPE,
            ''
        );

        if (empty($type)) {
            $buildComponentObjectService = $this->serviceContainer->get(
                $this->defaultBuildComponentObject
            );

            $this->assertValidInstance($buildComponentObjectService);

            return $buildComponentObjectService->__invoke(
                $componentConfig,
                $options
            );
        }

        $buildComponentObjectServiceName = $this->getTypeValue->__invoke(
            $type,
            BuildComponentObject::class,
            $this->defaultBuildComponentObject
        );

        /** @var BuildComponentObject $buildComponentObjectService */
        $buildComponentObjectService = $this->serviceContainer->get(
            $buildComponentObjectServiceName
        );

        $this->assertValidInstance($buildComponentObjectService);

        return $buildComponentObjectService->__invoke(
            $componentConfig,
            $options
        );
    }

    /**
     * @param $buildComponentObjectService
     *
     * @return void
     * @throws \Exception
     */
    protected function assertValidInstance($buildComponentObjectService)
    {
        if (!is_a($buildComponentObjectService, BuildComponentObject::class)) {
            throw new \Exception(
                'BuildComponentObject Service must be instance of ' . BuildComponentObject::class
            );
        }
    }
}
