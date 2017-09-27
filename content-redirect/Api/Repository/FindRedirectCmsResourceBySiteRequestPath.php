<?php

namespace Zrcms\ContentRedirect\Api\Repository;

use Zrcms\ContentRedirect\Model\RedirectCmsResource;

/**
 * Find published CmsResource by site and request path
 *
 * @author James Jervis - https://github.com/jerv13
 */
interface FindRedirectCmsResourceBySiteRequestPath
{
    /**
     * @param string $siteCmsResourceId
     * @param string $requestPath
     * @param bool   $published
     * @param array  $options
     *
     * @return RedirectCmsResource|null
     */
    public function __invoke(
        string $siteCmsResourceId,
        string $requestPath,
        bool $published = true,
        array $options = []
    );
}
