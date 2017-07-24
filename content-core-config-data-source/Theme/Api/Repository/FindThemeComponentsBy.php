<?php

namespace Zrcms\ContentCoreConfigDataSource\Theme\Api;

use Zrcms\ContentCore\Theme\Model\ThemeComponent;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class FindThemeComponentsBy implements \Zrcms\ContentCore\Theme\Api\Repository\FindThemeComponentsBy
{
    /**
     * @param array      $criteria
     * @param array|null $orderBy
     * @param null       $limit
     * @param null       $offset
     * @param array      $options
     *
     * @return ThemeComponent[]
     */
    public function __invoke(
        array $criteria,
        array $orderBy = null,
        $limit = null,
        $offset = null,
        array $options = []
    ): array
    {

    }
}
