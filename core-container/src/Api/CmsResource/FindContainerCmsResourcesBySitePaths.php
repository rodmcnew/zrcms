<?php

namespace Zrcms\CoreContainer\Api\CmsResource;

use Zrcms\CoreContainer\Model\ContainerCmsResource;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface FindContainerCmsResourcesBySitePaths
{
    /**
     * @param string $siteCmsResourceId
     * @param array  $containerCmsResourcePaths
     * @param bool   $published
     * @param array  $options
     *
     * @return ContainerCmsResource[]
     */
    public function __invoke(
        string $siteCmsResourceId,
        array $containerCmsResourcePaths,
        bool $published = true,
        array $options = []
    ): array;
}