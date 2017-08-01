<?php

namespace Zrcms\ContentCountryDoctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zrcms\Content\Model\PropertiesCmsResource;
use Zrcms\ContentCountry\Model\CountryCmsResource;
use Zrcms\ContentCountry\Model\CountryCmsResourceAbstract;
use Zrcms\ContentCountry\Model\PropertiesCountryCmsResource;
use Zrcms\ContentDoctrine\Entity\CmsResourceEntity;
use Zrcms\ContentDoctrine\Entity\CmsResourceEntityTrait;
use Zrcms\Param\Param;

/**
 * @author James Jervis - https://github.com/jerv13
 *
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(
 *     name="zrcms_core_country_resource",
 *     indexes={}
 * )
 */
class CountryCmsResourceEntity
    extends CountryCmsResourceAbstract
    implements CountryCmsResource, CmsResourceEntity
{
    use CmsResourceEntityTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $contentVersionId = null;

    /**
     * @var array
     *
     * @ORM\Column(type="json_array")
     */
    protected $properties = [];

    /**
     * Date object was first created
     *
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $createdDate;

    /**
     * User ID of creator
     *
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $createdByUserId;

    /**
     * Short description of create reason
     *
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $createdReason;

    /**
     * @param array  $properties
     * @param string $createdByUserId
     * @param string $createdReason
     */
    public function __construct(
        array $properties,
        string $createdByUserId,
        string $createdReason
    ) {
        $this->id = Param::getInt(
            $properties,
            PropertiesCountryCmsResource::ID
        );

        $this->contentVersionId = Param::getInt(
            $properties,
            PropertiesCountryCmsResource::CONTENT_VERSION_ID
        );

        parent::__construct(
            $properties,
            $createdByUserId,
            $createdReason
        );
    }
}
