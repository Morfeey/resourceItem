<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Content\ContentCorrectorInterface;

class ContentService
{
    public function __construct
    (
        protected readonly iterable $contentCorrectorCollection
    ){
    }

    public function correct(string $content): ?string
    {
        /** @var ContentCorrectorInterface $corrector */
        foreach ($this->contentCorrectorCollection as $corrector) {
            $content = $corrector->correct($content);
        }

        return $content;
    }
}