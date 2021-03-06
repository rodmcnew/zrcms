<?php

namespace Zrcms\Core\Model;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface Content extends Immutable, Properties
{
    /**
     * @todo Content by default should not require IDs, this is BC stuff primarily
     * @return string|null
     */
    public function getId();
}
