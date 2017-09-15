<?php

namespace Zrcms\HttpExpressive1\HttpRender;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zrcms\ContentCore\Page\Exception\PageNotFoundException;
use Zrcms\ContentCore\Site\Exception\SiteNotFoundException;
use Zrcms\ContentCore\View\Api\GetViewByRequest;
use Zrcms\ContentCore\View\Api\Render\GetViewLayoutTags;
use Zrcms\ContentCore\View\Api\Render\RenderView;
use Zrcms\ContentCore\View\Model\View;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class RenderPage
{
    /**
     * @param GetViewByRequest  $getViewByRequest
     * @param GetViewLayoutTags $getViewLayoutTags
     * @param RenderView        $renderView
     */
    public function __construct(
        GetViewByRequest $getViewByRequest,
        GetViewLayoutTags $getViewLayoutTags,
        RenderView $renderView
    ) {
        $this->getViewByRequest = $getViewByRequest;
        $this->getViewLayoutTags = $getViewLayoutTags;
        $this->renderView = $renderView;
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
        try {
            /** @var View $view */
            $view = $this->getViewByRequest->__invoke(
                $request
            );
        } catch (SiteNotFoundException $exception) {
            return new HtmlResponse(
                'NOT FOUND',
                404,
                ['reason-phrase', 'NOT FOUND: SITE']
            );
        } catch (PageNotFoundException $exception) {
            return new HtmlResponse(
                'NOT FOUND',
                404,
                ['reason-phrase', 'NOT FOUND: PAGE']
            );
        }

        if (empty($view)) {
            return new HtmlResponse(
                'NOT FOUND',
                404,
                ['reason-phrase', 'NOT FOUND: NO VIEW']
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

        return new HtmlResponse($html);
    }
}
