<?php

namespace Zrcms\ContentCoreConfigDataSource\Theme\Api;

use Psr\Container\ContainerInterface;
use Zrcms\ContentCoreConfigDataSource\Content\Api\ReadComponentConfigBasicAbstract;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ReadLayoutComponentConfigBasic
    extends ReadComponentConfigBasicAbstract
    implements ReadLayoutComponentConfig
{
    /**
     * @param ContainerInterface $serviceContainer
     * @param string             $defaultComponentConfigReaderServiceName
     */
    public function __construct(
        $serviceContainer,
        string $defaultComponentConfigReaderServiceName = ReadLayoutComponentConfigJsonFile::class
    ) {
        parent::__construct(
            $serviceContainer,
            $defaultComponentConfigReaderServiceName
        );
    }
}