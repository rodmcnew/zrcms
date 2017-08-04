<?php

namespace Zrcms\ContentCore\Block\Api\Repository;

use Psr\Http\Message\ServerRequestInterface;
use Zrcms\ContentCore\Block\Model\Block;
use Zrcms\ContentCore\Block\Model\BlockComponent;
use Zrcms\ContentCore\Block\Model\PropertiesBlockComponent;
use Zrcms\ContentCore\Block\Model\ServiceAliasBlock;
use Zrcms\ServiceAlias\Api\GetServiceFromAlias;
use Zrcms\ServiceAlias\ServiceCheck;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class GetBlockDataBasic implements GetBlockData
{
    /**
     * @var GetServiceFromAlias
     */
    protected $getServiceFromAlias;

    /**
     * @var string
     */
    protected $serviceAliasNamespace;

    /**
     * @var FindBlockComponent
     */
    protected $findBlockComponent;

    /**
     * @var string
     */
    protected $defaultGetBlockDataServiceName;

    /**
     * @param GetServiceFromAlias $getServiceFromAlias
     * @param FindBlockComponent  $findBlockComponent
     * @param string              $defaultGetBlockDataServiceName
     */
    public function __construct(
        GetServiceFromAlias $getServiceFromAlias,
        FindBlockComponent $findBlockComponent,
        string $defaultGetBlockDataServiceName = GetBlockDataNoop::class
    ) {
        $this->getServiceFromAlias = $getServiceFromAlias;
        $this->serviceAliasNamespace = ServiceAliasBlock::NAMESPACE_CONTENT_DATA_PROVIDER;
        $this->findBlockComponent = $findBlockComponent;
        $this->defaultGetBlockDataServiceName = $defaultGetBlockDataServiceName;
    }

    /**
     * @param Block                  $block
     * @param ServerRequestInterface $request
     * @param array                  $options
     *
     * @return array
     * @throws \Exception
     */
    public function __invoke(
        Block $block,
        ServerRequestInterface $request,
        array $options = []
    ) : array
    {
        /** @var BlockComponent $blockComponent */
        $blockComponent = $this->findBlockComponent->__invoke(
            $block->getBlockComponentName()
        );

        $getBlockDataServiceAlias = $blockComponent->getProperty(
            PropertiesBlockComponent::DATA_PROVIDER,
            ''
        );

        /** @var GetBlockData $getBlockData */
        $getBlockData = $this->getServiceFromAlias->__invoke(
            $this->serviceAliasNamespace,
            $getBlockDataServiceAlias,
            GetBlockData::class,
            $this->defaultGetBlockDataServiceName
        );

        ServiceCheck::assertNotSelfReference($this, $getBlockData);

        return $getBlockData->__invoke(
            $block,
            $request,
            $options
        );
    }
}
