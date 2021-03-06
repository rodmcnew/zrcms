<?php

namespace Zrcms\CoreSite\Api\CmsResource;

use Zrcms\CoreSite\Model\SiteCmsResource;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface FindSiteCmsResourceByHost
{
    /**
     * @param string    $host
     * @param bool|null $published
     * @param array     $options
     *
     * @return SiteCmsResource|null
     */
    public function __invoke(
        string $host,
        $published = true,
        array $options = []
    );
}
