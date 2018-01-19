<?php

namespace Zrcms\HttpApi\CmsResource;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zrcms\Core\Api\CmsResource\CmsResourceToArray;
use Zrcms\Core\Api\CmsResource\FindCmsResource;
use Zrcms\Http\Model\ResponseCodes;
use Zrcms\Http\Response\ZrcmsJsonResponse;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class HttpApiFindCmsResource
{
    const SOURCE = 'zrcms-find-cms-resource';

    protected $findCmsResource;
    protected $cmsResourceToArray;
    protected $name;

    /**
     * @param FindCmsResource    $findCmsResource
     * @param CmsResourceToArray $cmsResourceToArray
     * @param string             $name
     */
    public function __construct(
        FindCmsResource $findCmsResource,
        CmsResourceToArray $cmsResourceToArray,
        string $name
    ) {
        $this->findCmsResource = $findCmsResource;
        $this->cmsResourceToArray = $cmsResourceToArray;
        $this->name = $name;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     * @param callable|null          $next
     *
     * @return ResponseInterface
     * @throws \Exception
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) {
        $cmsResourceId = (string)$request->getAttribute(
            'id'
        );

        if (empty($cmsResourceId)) {
            $apiMessages = [
                'type' => $this->name,
                'message' => 'ID not received',
                'source' => self::SOURCE,
                'code' => ResponseCodes::ID_NOT_RECEIVED,
                'primary' => true,
                'params' => []
            ];

            return new ZrcmsJsonResponse(
                null,
                $apiMessages,
                400
            );
        }

        $cmsResource = $this->findCmsResource->__invoke(
            $cmsResourceId
        );

        if (empty($cmsResource)) {
            $apiMessages = [
                'type' => $this->name,
                'message' => 'Find failed',
                'source' => self::SOURCE,
                'code' => ResponseCodes::FAILED,
                'primary' => true,
                'params' => []
            ];

            return new ZrcmsJsonResponse(
                null,
                $apiMessages,
                404
            );
        }

        $result = $this->cmsResourceToArray->__invoke(
            $cmsResource
        );

        return new ZrcmsJsonResponse(
            $result
        );
    }
}
