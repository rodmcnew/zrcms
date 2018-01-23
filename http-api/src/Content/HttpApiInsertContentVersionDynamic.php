<?php

namespace Zrcms\HttpApi\Content;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zrcms\Core\Api\Content\ContentVersionToArray;
use Zrcms\Core\Api\Content\InsertContentVersion;
use Zrcms\Core\Model\ContentVersionBasic;
use Zrcms\Http\Api\BuildResponseOptions;
use Zrcms\Http\Response\ZrcmsJsonResponse;
use Zrcms\HttpApi\Dynamic;
use Zrcms\Param\Param;
use Zrcms\User\Api\GetUserIdByRequest;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class HttpApiInsertContentVersionDynamic
{
    const SOURCE = 'http-api-find-cms-resource-dynamic';

    protected $serviceContainer;
    protected $getUserIdByRequest;
    protected $contentVersionToArrayDefault;
    protected $debug;

    /**
     * @param ContainerInterface    $serviceContainer
     * @param GetUserIdByRequest    $getUserIdByRequest
     * @param ContentVersionToArray $contentVersionToArrayDefault
     * @param bool                  $debug
     */
    public function __construct(
        ContainerInterface $serviceContainer,
        GetUserIdByRequest $getUserIdByRequest,
        ContentVersionToArray $contentVersionToArrayDefault,
        bool $debug = false
    ) {
        $this->serviceContainer = $serviceContainer;
        $this->getUserIdByRequest = $getUserIdByRequest;
        $this->contentVersionToArrayDefault = $contentVersionToArrayDefault;
        $this->debug = $debug;

    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     * @param callable|null          $next
     *
     * @return ResponseInterface|ZrcmsJsonResponse
     * @throws \Exception
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) {
        $dynamicApiConfig = $request->getAttribute(Dynamic::ATTRIBUTE_DYNAMIC_API_CONFIG);

        $apiConfig = Param::getArray(
            $dynamicApiConfig,
            Dynamic::MIDDLEWARE_NAME_API,
            []
        );

        $apiServiceName = Param::getString(
            $apiConfig,
            'api-service',
            null
        );

        if ($apiServiceName === null) {
            throw new \Exception('api-service must be defined');
        }

        /** @var InsertContentVersion $apiService */
        $apiService = $this->serviceContainer->get($apiServiceName);

        if (!$apiService instanceof InsertContentVersion) {
            throw new \Exception('api-service must be instance of ' . InsertContentVersion::class);
        }

        $contentVersionData = $request->getParsedBody();

        $reason = $contentVersionData['createdReason'] . ' (source: ' . static::SOURCE . ')';

        $userId = $this->getUserIdByRequest->__invoke($request);

        $contentVersion = new ContentVersionBasic(
            null,
            $contentVersionData['properties'],
            $userId,
            $reason
        );

        $contentVersion = $apiService->__invoke(
            $contentVersion
        );

        $toArrayService = $this->contentVersionToArrayDefault;

        $toArrayServiceName = Param::getString(
            $apiConfig,
            'to-array',
            null
        );

        if ($toArrayServiceName !== null) {
            /** @var ContentVersionToArray $isAllowed */
            $toArrayService = $this->serviceContainer->get($toArrayServiceName);
        }

        if (!$toArrayService instanceof ContentVersionToArray) {
            throw new \Exception(
                'to-array must be instance of ' . ContentVersionToArray::class
                . ' got .' . get_class($toArrayService)
                . ' for dynamic api: (' . $request->getAttribute(Dynamic::ATTRIBUTE_DYNAMIC_API_TYPE) . ')'
            );
        }

        return new ZrcmsJsonResponse(
            $toArrayService->__invoke($contentVersion),
            null,
            200,
            [],
            BuildResponseOptions::invoke()
        );
    }
}
