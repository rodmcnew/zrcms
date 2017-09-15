<?php

namespace Zrcms\Content\Model;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface CmsResource extends Immutable, Properties, Trackable
{
    /**
     * @param                $id
     * @param bool           $published
     * @param ContentVersion $contentVersion
     * @param array          $properties
     * @param string         $createdByUserId
     * @param string         $createdReason
     */
    public function __construct(
        $id,
        bool $published,
        ContentVersion $contentVersion,
        array $properties,
        string $createdByUserId,
        string $createdReason
    );

    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return ContentVersion
     */
    public function getContentVersion();

    /**
     * @return bool
     */
    public function isPublished(): bool;
}
