<?php

namespace Zrcms\CorePage\Api\CmsResource;

use Zrcms\Core\Api\CmsResource\FindCmsResource;
use Zrcms\Core\Model\CmsResource;
use Zrcms\CorePage\Model\PageTemplateCmsResource;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface FindPageTemplateCmsResource extends FindCmsResource
{
    /**
     * @param string $id
     * @param array  $options
     *
     * @return PageTemplateCmsResource|CmsResource|null
     */
    public function __invoke(
        string $id,
        array $options = []
    );
}
