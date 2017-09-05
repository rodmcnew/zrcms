<?php

namespace Zrcms\ContentRedirect\Model;

use Zrcms\Content\Model\CmsResource;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface RedirectCmsResource extends CmsResource
{
    /**
     * if string, then applies to that site
     * if null, then applies to ALL sites
     *
     * @return string|null
     */
    public function getSiteCmsResourceId();

    /**
     * @return string
     */
    public function getRequestPath(): string;
}