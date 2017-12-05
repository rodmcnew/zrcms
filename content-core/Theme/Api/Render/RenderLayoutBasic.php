<?php

namespace Zrcms\ContentCore\Theme\Api\Render;

use Zrcms\Content\Model\Content;
use Zrcms\ContentCore\Theme\Model\Layout;
use Zrcms\ContentCore\Theme\Fields\FieldsLayout;
use Zrcms\ContentCore\Theme\Model\ServiceAliasLayout;
use Zrcms\ServiceAlias\Api\GetServiceFromAlias;
use Zrcms\ServiceAlias\ServiceCheck;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class RenderLayoutBasic implements RenderLayout
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
     * @var string
     */
    protected $defaultRenderServiceName;

    /**
     * @param GetServiceFromAlias $getServiceFromAlias
     * @param string              $defaultRenderServiceName
     */
    public function __construct(
        GetServiceFromAlias $getServiceFromAlias,
        string $defaultRenderServiceName = RenderLayoutMustache::class
    ) {
        $this->getServiceFromAlias = $getServiceFromAlias;
        $this->serviceAliasNamespace = ServiceAliasLayout::ZRCMS_CONTENT_RENDERER;
        $this->defaultRenderServiceName = $defaultRenderServiceName;
    }

    /**
     * @param Layout|Content $layout
     * @param array          $renderTags ['render-tag' => '{html}']
     * @param array          $options
     *
     * @return string
     * @throws \Exception
     */
    public function __invoke(
        Content $layout,
        array $renderTags,
        array $options = []
    ): string
    {
        $renderServiceAlias = $layout->getProperty(
            FieldsLayout::RENDERER,
            ''
        );

        /** @var RenderLayout $render */
        $render = $this->getServiceFromAlias->__invoke(
            $this->serviceAliasNamespace,
            $renderServiceAlias,
            RenderLayout::class,
            $this->defaultRenderServiceName
        );

        ServiceCheck::assertNotSelfReference($this, $render);

        return $render->__invoke(
            $layout,
            $renderTags,
            $options
        );
    }
}
