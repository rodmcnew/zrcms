<?php

namespace Zrcms\CoreBlock\Api\Render;

use Reliv\ArrayProperties\Property;
use Zrcms\Core\Model\Content;
use Zrcms\CoreBlock\Model\Block;

/**
 * Component is missing or has been removed, use this renderer
 *
 * @author James Jervis - https://github.com/jerv13
 */
class RenderBlockMissingDiv implements RenderBlockMissing
{
    /**
     * @param Block|Content $block
     * @param array         $renderTags ['render-tag' => '{html}']
     * @param array         $options
     *
     * @return string
     */
    public function __invoke(
        Content $block,
        array $renderTags,
        array $options = []
    ): string {
        $reason = Property::getString(
            $options,
            self::OPTION_REASON,
            self::DEFAULT_REASON
        );

        $message = 'BLOCK COMPONENT (' . $block->getBlockComponentName() . ')'
            . ' NOT RENDERED (' . $reason . ')  '
            . ' for block: ' . $block->getId();

        return "\n"
            . '<div class="block-missing-not-rendered" style="color:red; display:none; border: 1px dashed red;">'
            . $message .
            '</div>'
            . "\n";
    }
}
