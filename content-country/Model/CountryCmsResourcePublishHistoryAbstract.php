<?php

namespace Zrcms\ContentCountry\Model;

use Zrcms\Content\Exception\PropertyMissingException;
use Zrcms\Content\Model\PropertiesCmsResourcePublishHistory;
use Zrcms\Param\Param;

/**
 * @author James Jervis - https://github.com/jerv13
 */
abstract class CountryCmsResourcePublishHistoryAbstract
    extends CountryCmsResourceAbstract
    implements CountryCmsResourcePublishHistory
{
    /**
     * @var string
     */
    protected $action;

    /**
     * @param array  $properties
     * @param string $publishedByUserId
     * @param string $publishReason
     */
    public function __construct(
        array $properties,
        string $publishedByUserId,
        string $publishReason
    ) {

        $this->action = Param::getRequired(
            $properties,
            PropertiesCmsResourcePublishHistory::ACTION,
            PropertyMissingException::build(
                PropertiesCmsResourcePublishHistory::ACTION,
                $properties,
                get_class($this)
            )
        );

        parent::__construct(
            $properties,
            $publishedByUserId,
            $publishReason
        );
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }
}
