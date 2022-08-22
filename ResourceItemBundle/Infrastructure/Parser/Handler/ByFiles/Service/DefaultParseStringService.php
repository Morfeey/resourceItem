<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Search\Enum\ParseSearchStringTypeEnum;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Helper\ContentHelper;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Helper\FileHelper;

abstract class DefaultParseStringService
{
    use FileHelper, ContentHelper;
    public function __construct
    (
        protected readonly SearchTxtFileService $fileService,
        protected readonly ContentService $contentService
    ){
    }

    abstract function getType(): ParseSearchStringTypeEnum;

    public function get(ResourceFileXdbContentGetter $contentGetter): ?string
    {
        if (!$contentGetter->isCreatedContent()) {
            return null;
        }

        $txtFile = $this->fileService->search($contentGetter, $this->getType());
        if (!$txtFile) {
            return null;
        }

        $content = $this->getContent($txtFile);
        if (!$content) {
            return null;
        }

        return
            $this->contentService->correct(
                $this->decode($content)
            );
    }
}