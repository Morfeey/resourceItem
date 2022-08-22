<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Search;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\ResourceFileXdbContentGetter;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Search\Enum\ParseSearchStringTypeEnum;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Helper\FileHelper;

class CroppedNamingCase extends CommonCase
{
    use FileHelper;
    public function search(ResourceFileXdbContentGetter $contentGetter, ParseSearchStringTypeEnum $type): ?string
    {
        return
            $this->createPrototypeStringValue()
                ->setString($this->createDefaultExtractedFileName($contentGetter->getFilename(), $type))
                ->replace(
                    $type->name . '.txt',
                    ($type === ParseSearchStringTypeEnum::Description ? 'Desc' : '') . '.txt')
                ->getResult();
    }
}