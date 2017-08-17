<?php

namespace Zrcms\HttpRedirect\Redirect\Api\Repository;

use Zrcms\Content\Api\Repository\InsertContentVersion;
use Zrcms\Content\Model\ContentVersion;
use Zrcms\HttpRedirect\Redirect\Model\RedirectVersion;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface InsertRedirectVersion extends InsertContentVersion
{
    /**
     * @param RedirectVersion|ContentVersion $RedirectVersion
     * @param array                      $options
     *
     * @return ContentVersion
     */
    public function __invoke(
        ContentVersion $RedirectVersion,
        array $options = []
    ): ContentVersion;
}
