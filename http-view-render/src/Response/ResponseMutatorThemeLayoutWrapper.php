<?php

namespace Zrcms\HttpViewRender\Response;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Stream;
use Zrcms\ContentCore\Page\Exception\PageNotFound;
use Zrcms\ContentCore\Site\Exception\SiteNotFound;
use Zrcms\ContentCore\View\Api\GetViewByRequestHtmlPage;
use Zrcms\ContentCore\View\Api\Render\GetViewLayoutTags;
use Zrcms\ContentCore\View\Api\Render\RenderView;
use Zrcms\ContentCore\View\Model\View;
use Zrcms\Http\Response\ZrcmsHtmlResponse;
use Zrcms\Param\Param;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ResponseMutatorThemeLayoutWrapper
{
    /**
     * @var GetViewByRequestHtmlPage
     */
    protected $getViewByRequestHtmlPage;

    /**
     * @var GetViewLayoutTags
     */
    protected $getViewLayoutTags;

    /**
     * @var RenderView
     */
    protected $renderView;

    /**
     * @var array
     */
    protected $pageLayoutConfig;

    /**
     * @param GetViewByRequestHtmlPage $getViewByRequestHtmlPage
     * @param GetViewLayoutTags        $getViewLayoutTags
     * @param RenderView               $renderView
     * @param array                    $pageLayoutConfig
     */
    public function __construct(
        GetViewByRequestHtmlPage $getViewByRequestHtmlPage,
        GetViewLayoutTags $getViewLayoutTags,
        RenderView $renderView,
        array $pageLayoutConfig = []
    ) {
        $this->getViewByRequestHtmlPage = $getViewByRequestHtmlPage;
        $this->getViewLayoutTags = $getViewLayoutTags;
        $this->renderView = $renderView;
        $this->pageLayoutConfig = $pageLayoutConfig;
    }

    /**
     * __invoke
     *
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
        /** @var HtmlResponse|ZrcmsHtmlResponse $response */
        $response = $next($request, $response);

        if (!$this->canHandleResponse($request, $response)) {
            return $response;
        }

        $options = $this->getProperties($response);

        try {
            /** @var View $view */
            $view = $this->getViewByRequestHtmlPage->__invoke(
                $request,
                $options
            );
        } catch (SiteNotFound $exception) {
            return new HtmlResponse(
                'NOT FOUND',
                404,
                ['reason-phrase' => 'NOT FOUND: SITE']
            );
        } catch (PageNotFound $exception) {
            return new HtmlResponse(
                'NOT FOUND',
                404,
                ['reason-phrase' => 'NOT FOUND: PAGE']
            );
        }

        if (empty($view)) {
            return new HtmlResponse(
                'NOT FOUND',
                404,
                ['reason-phrase' => 'NOT FOUND: NO VIEW']
            );
        }

        $viewRenderTags = $this->getViewLayoutTags->__invoke(
            $view,
            $request
        );

        $html = $this->renderView->__invoke(
            $view,
            $viewRenderTags
        );

        $body = new Stream('php://temp', 'wb+');
        $body->write($html);
        $body->rewind();

        return $response->withBody($body)
            ->withAddedHeader('zrcms-response-mutator', 'ResponseMutatorThemeLayoutWrapper');
    }

    /**
     * @param ResponseInterface $response
     *
     * @return array
     */
    protected function getProperties(ResponseInterface $response)
    {
        $properties = [];
        if ($response instanceof ZrcmsHtmlResponse) {
            $properties = $response->getProperties();
        }

        $body = $response->getBody();
        $body->rewind();

        $contents = $body->getContents();

        $properties[GetViewByRequestHtmlPage::OPTION_HTML] = $contents;

        return $properties;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     *
     * @return bool
     */
    protected function canHandleResponse(
        ServerRequestInterface $request,
        ResponseInterface $response
    ):bool
    {
        if ($response instanceof ZrcmsHtmlResponse) {
            $renderLayout = $response->getProperty(
                ZrcmsHtmlResponse::PROPERTY_RENDER_LAYOUT,
                ZrcmsHtmlResponse::DEFAULT_RENDER_LAYOUT
            );

            return $renderLayout;
        }

        return Param::getBool(
            $this->pageLayoutConfig,
            $request->getUri()->getPath(),
            false
        );
    }
}