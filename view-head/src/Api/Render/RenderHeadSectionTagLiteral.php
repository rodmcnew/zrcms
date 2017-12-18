<?php

namespace Zrcms\ViewHead\Api\Render;

use Psr\Http\Message\ServerRequestInterface;
use Zrcms\Param\Param;
use Zrcms\ViewHead\Api\Exception\CanNotRenderHeadSectionTag;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class RenderHeadSectionTagLiteral implements RenderHeadSectionTag
{
    protected $defaultDebug;

    /**
     * @param bool $defaultDebug
     */
    public function __construct(
        bool $defaultDebug = true
    ) {
        $this->defaultDebug = $defaultDebug;
    }

    /**
     * @param ServerRequestInterface $request
     * @param string                 $tag
     * @param string                 $sectionEntryName
     * @param array                  $sectionConfig
     * @param array                  $options
     *
     * @return string
     * @throws CanNotRenderHeadSectionTag
     */
    public function __invoke(
        ServerRequestInterface $request,
        string $tag,
        string $sectionEntryName,
        array $sectionConfig,
        array $options = []
    ): string {
        // literal - Render a string as it is in the config
        if (!array_key_exists('__literal', $sectionConfig)) {
            throw new CanNotRenderHeadSectionTag('Does not have required key: (__literal)');
        }

        $debug = Param::getBool(
            $options,
            self::OPTION_DEBUG,
            $this->defaultDebug
        );
        $indent = Param::getString(
            $options,
            self::OPTION_INDENT,
            '    '
        );
        $lineBreak = Param::getString(
            $options,
            self::OPTION_LINE_BREAK,
            "\n"
        );

        $contentHtml = '';

        if ($debug) {
            $contentHtml .= $indent . '<!-- RenderHeadSectionTagLiteral -->' . $lineBreak;
        }

        $contentHtml .= $indent . (string)$sectionConfig['__literal'] . $lineBreak;

        return $contentHtml;
    }
}
