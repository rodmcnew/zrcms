<?php

namespace Zrcms\ContentCore\Page\Api\Repository;

use Zrcms\Content\Api\Repository\FindContentVersionsBy;
use Zrcms\ContentCore\Page\Model\PageContainerVersion;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface FindPageContainerVersionsBy extends FindContentVersionsBy
{
    /**
     * @param array      $criteria
     * @param array|null $orderBy
     * @param null       $limit
     * @param null       $offset
     * @param array      $options
     *
     * @return PageContainerVersion[]
     */
    public function __invoke(
        array $criteria,
        array $orderBy = null,
        $limit = null,
        $offset = null,
        array $options = []
    ): array;
}
