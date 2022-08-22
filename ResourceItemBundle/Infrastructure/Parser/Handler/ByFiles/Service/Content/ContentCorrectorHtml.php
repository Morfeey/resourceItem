<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Content;

class ContentCorrectorHtml implements ContentCorrectorInterface
{
    private const REPLACE_CASES =
        [
            '<html>',
            '</html>',
            '<p>',
            '</p>',
            '<br>',
            '<br/>'
        ];

    public function correct(string $content): string
    {
        return str_replace(self::REPLACE_CASES, '', $content);
    }
}