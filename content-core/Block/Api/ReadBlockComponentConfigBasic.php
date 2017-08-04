<?php

namespace Zrcms\ContentCore\Block\Api;

use Zrcms\Content\Api\ReadComponentConfigBasicAbstract;
use Zrcms\ContentCore\Block\Model\ServiceAliasBlock;
use Zrcms\ServiceAlias\Api\GetServiceFromAlias;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ReadBlockComponentConfigBasic
    extends ReadComponentConfigBasicAbstract
    implements ReadBlockComponentConfig
{
    /**
     * @param GetServiceFromAlias $getServiceFromAlias
     * @param string              $defaultComponentConfigReaderServiceName
     */
    public function __construct(
        GetServiceFromAlias $getServiceFromAlias,
        string $defaultComponentConfigReaderServiceName = ReadBlockComponentConfigJsonFile::class
    ) {
        parent::__construct(
            $getServiceFromAlias,
            ServiceAliasBlock::NAMESPACE_COMPONENT_CONFIG_READER,
            $defaultComponentConfigReaderServiceName
        );
    }
}
