<?php

namespace Zrcms\ContentRedirect\Model;

use Zrcms\Content\Exception\CmsResourceInvalid;
use Zrcms\Content\Model\CmsResource;
use Zrcms\Content\Model\CmsResourcePublishHistoryAbstract;

/**
 * @author James Jervis - https://github.com/jerv13
 */
abstract class RedirectCmsResourcePublishHistoryAbstract extends CmsResourcePublishHistoryAbstract
{
    /**
     * @param string|null                     $id
     * @param string                          $action
     * @param RedirectCmsResource|CmsResource $cmsResource
     * @param string                          $publishedByUserId
     * @param string                          $publishReason
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
        if (!$cmsResource instanceof RedirectCmsResource) {
            throw new CmsResourceInvalid(
                'CmsResource must be instance of: ' . RedirectCmsResource::class
                . ' got: ' . var_export($cmsResource, true)
                . ' for: ' . get_class($this)
            );
        }
    }
}
