<?php

namespace Zrcms\ContentCoreDoctrineDataSource\Container\Api\Content;

use Doctrine\ORM\EntityManager;
use Zrcms\Content\Model\ContentVersion;
use Zrcms\ContentCore\Container\Model\ContainerVersionBasic;
use Zrcms\ContentCoreDoctrineDataSource\Container\Entity\ContainerVersionEntity;
use Zrcms\ContentDoctrine\Api\Content\FindContentVersion;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class FindContainerVersion
    extends FindContentVersion
    implements \Zrcms\ContentCore\Container\Api\Content\FindContainerVersion
{
    /**
     * @param EntityManager $entityManager
     */
    public function __construct(
        EntityManager $entityManager
    ) {
        parent::__construct(
            $entityManager,
            ContainerVersionEntity::class,
            ContainerVersionBasic::class
        );
    }

    /**
     * @param string $id
     * @param array  $options
     *
     * @return ContainerVersionBasic|ContentVersion|null
     */
    public function __invoke(
        string $id,
        array $options = []
    ) {
        return parent::__invoke(
            $id,
            $options
        );
    }
}