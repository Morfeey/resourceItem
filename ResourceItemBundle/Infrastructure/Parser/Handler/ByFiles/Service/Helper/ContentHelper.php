<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Helper;

trait ContentHelper
{
    public function decode(string $content): string
    {
        return iconv('UTF-16LE','utf8', $content);
    }
}