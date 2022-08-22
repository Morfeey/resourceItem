<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Search;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\ResourceFileXdbContentGetter;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Search\Enum\ParseSearchStringTypeEnum;

class ResourceNamingFieldCase extends CommonCase
{
    public function search(ResourceFileXdbContentGetter $contentGetter, ParseSearchStringTypeEnum $type): ?string
    {
        $namingContentFileName = $contentGetter->getNamingContentBySearchType($type);
        if (!$namingContentFileName) {
            return null;
        }

        $defaultName = $this->createDefaultExtractedFileName($contentGetter->getFilename(), $type);
        $explodePath = explode(DIRECTORY_SEPARATOR, $defaultName);
        $fileName = $explodePath[array_key_last($explodePath)];

        return str_replace($fileName, $namingContentFileName, $defaultName);
    }
}