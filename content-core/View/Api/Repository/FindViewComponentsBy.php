<?php

namespace Zrcms\ContentCore\View\Api\Repository;

use Zrcms\Content\Api\Repository\FindComponentsBy;
use Zrcms\ContentCore\View\Model\ViewComponent;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface FindViewComponentsBy extends FindComponentsBy
{
    /**
     * @param array      $criteria
     * @param array|null $orderBy
     * @param null       $limit
     * @param null       $offset
     * @param array      $options
     *
     * @return ViewComponent[]
     */
    public function __invoke(
        array $criteria,
        array $orderBy = null,
        $limit = null,
        $offset = null,
        array $options = []
    ): array;
}
