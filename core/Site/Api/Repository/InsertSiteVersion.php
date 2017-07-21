<?php

namespace Zrcms\Core\Site\Api\Repository;

use Zrcms\Content\Api\Repository\InsertContentVersion;
use Zrcms\Content\Model\ContentVersion;
use Zrcms\Core\Site\Model\SiteVersion;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface InsertSiteVersion extends InsertContentVersion
{
    /**
     * @param SiteVersion|ContentVersion $siteVersion
     * @param array                      $options
     *
     * @return ContentVersion
     */
    public function __invoke(
        ContentVersion $siteVersion,
        array $options = []
    ): ContentVersion;
}
