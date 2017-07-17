<?php

namespace Zrcms\Core\Page\Model;

use Zrcms\Core\Container\Model\Container;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface PagePreRendered extends Page
{
    public function getHtml(): string;
}
