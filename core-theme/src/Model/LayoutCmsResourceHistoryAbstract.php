<?php

namespace Zrcms\CoreTheme\Model;

use Zrcms\Core\Exception\CmsResourceInvalid;
use Zrcms\Core\Model\CmsResource;
use Zrcms\Core\Model\CmsResourceHistoryAbstract;

/**
 * @author James Jervis - https://github.com/jerv13
 */
abstract class LayoutCmsResourceHistoryAbstract extends CmsResourceHistoryAbstract
{
    /**
     * @param string|null $id
     * @param string      $action
     * @param CmsResource $cmsResource
     * @param string      $publishedByUserId
     * @param string      $publishReason
     */
    public function __construct(
        $id,
        string $action,
        CmsResource $cmsResource,
        string $publishedByUserId,
        string $publishReason
    ) {
        parent::__construct(
            $id,
            $action,
            $cmsResource,
            $publishedByUserId,
            $publishedByUserId
        );
    }

    /**
     * @param CmsResource $cmsResource
     *
     * @return void
     * @throws CmsResourceInvalid
     */
    protected function assertValidCmsResource($cmsResource)
    {
        if (!$cmsResource instanceof LayoutCmsResource) {
            throw new CmsResourceInvalid(
                'CmsResource must be instance of: ' . LayoutCmsResource::class
                . ' got: ' . var_export($cmsResource, true)
                . ' for: ' . get_class($this)
            );
        }
    }
}
