<?php

namespace Zrcms\ContentCoreDoctrineDataSource\Page\Api\Repository;

use Doctrine\ORM\EntityManager;
use Zrcms\ContentCore\Page\Model\PageContainerCmsResource;
use Zrcms\ContentCore\Page\Model\PageContainerCmsResourceBasic;
use Zrcms\ContentCoreDoctrineDataSource\Page\Entity\PageContainerCmsResourceEntity;
use Zrcms\ContentDoctrine\Api\Repository\FindCmsResourcesBy;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class FindPageContainerCmsResourcesBy
    extends FindCmsResourcesBy
    implements \Zrcms\Content\Api\Repository\FindCmsResourcesBy
{
    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct(
            $entityManager,
            PageContainerCmsResourceEntity::class,
            PageContainerCmsResourceBasic::class
        );
    }

    /**
     * @param array      $criteria
     * @param array|null $orderBy
     * @param null       $limit
     * @param null       $offset
     * @param array      $options
     *
     * @return PageContainerCmsResource[]
     */
    public function __invoke(
        array $criteria,
        array $orderBy = null,
        $limit = null,
        $offset = null,
        array $options = []
    ): array
    {
        return parent::__invoke(
            $criteria,
            $orderBy,
            $limit,
            $offset,
            $options
        );
    }
}