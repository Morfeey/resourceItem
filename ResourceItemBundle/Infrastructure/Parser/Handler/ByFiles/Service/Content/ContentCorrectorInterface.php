<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Content;

interface ContentCorrectorInterface
{
    public function correct(string $content): string;
}