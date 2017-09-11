<?php

namespace Zrcms\ContentCoreDoctrineDataSource\Site\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zrcms\ContentCore\Site\Model\PropertiesSiteVersion;
use Zrcms\ContentCore\Site\Model\SiteVersionAbstract;
use Zrcms\ContentDoctrine\Entity\ContentEntity;
use Zrcms\ContentDoctrine\Entity\ContentEntityTrait;
use Zrcms\Param\Param;

/**
 * @author James Jervis - https://github.com/jerv13
 *
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(
 *     name="zrcms_core_site_version",
 *     indexes={}
 * )
 */
class SiteVersionEntity
    extends SiteVersionAbstract
    implements ContentEntity
{
    use ContentEntityTrait;

    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     *
     * @var array
     *
     * @ORM\Column(type="json_array")
     */
    protected $properties = [];

    /**
     * Date object was first created mapped to col createdDate
     *
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="createdDate")
     */
    protected $createdDateObject;

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
     * Theme name
     *
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $themeName;

    /**
     * Locale used for translations and formatting
     *
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $locale;

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
            PropertiesSiteVersion::ID
        );

        $this->themeName = Param::getString(
            $properties,
            PropertiesSiteVersion::THEME_NAME
        );

        $this->locale = Param::getString(
            $properties,
            PropertiesSiteVersion::LOCALE
        );

        parent::__construct(
            $properties,
            $createdByUserId,
            $createdReason
        );
    }
}
