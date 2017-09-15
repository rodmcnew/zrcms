<?php

namespace Zrcms\HttpExpressive1\HttpTest\Acl;

use Zrcms\Acl\Api\IsAllowed;
use Zrcms\HttpExpressive1\HttpApi\Acl\IsAllowedCheckApi;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class IsAllowedTest extends IsAllowedCheckApi
{
    /**
     * @param IsAllowed $isAllowed
     * @param array     $aclOptions
     */
    public function __construct(
        IsAllowed $isAllowed,
        array $aclOptions
    ) {
        parent::__construct(
            $isAllowed,
            $aclOptions,
            'is-allowed-test'
        );
    }
}
