<?php

namespace Zrcms\ContentCore\Theme\Api\CmsResource;

use Zrcms\ContentCore\Theme\Model\LayoutCmsResource;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface FindLayoutCmsResourceByThemeNameLayoutName
{
    /**
     * @param string $themeName
     * @param string $layoutName
     * @param bool   $published
     * @param array  $options
     *
     * @return LayoutCmsResource|null
     */
    public function __invoke(
        string $themeName,
        string $layoutName,
        bool $published = true,
        array $options = []
    );
}