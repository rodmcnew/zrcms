<?php

namespace Zrcms\ContentCore\View\Api;

use Zrcms\ContentCore\Theme\Model\Layout;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface GetTagNamesByLayout
{
    /**
     * @param Layout $layout
     * @param array  $options
     *
     * @return string[] ['{container-path}']
     */
    public function __invoke(
        Layout $layout,
        array $options = []
    ): array;
}