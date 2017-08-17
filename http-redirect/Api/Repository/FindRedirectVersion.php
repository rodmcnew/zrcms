<?php

namespace Zrcms\HttpRedirect\Redirect\Api\Repository;

use Zrcms\Content\Api\Repository\FindContentVersion;
use Zrcms\Content\Model\ContentVersion;
use Zrcms\HttpRedirect\Redirect\Model\RedirectVersion;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface FindRedirectVersion extends FindContentVersion
{
    /**
     * @param string $id
     * @param array  $options
     *
     * @return RedirectVersion|ContentVersion|null
     */
    public function __invoke(
        string $id,
        array $options = []
    );
}
