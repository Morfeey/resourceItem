<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Search\Enum\ParseSearchStringTypeEnum;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Helper\FileHelper;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Search\SearchStrategyInterface;

class SearchTxtFileService
{
    use FileHelper;

    public function __construct
    (
        protected readonly iterable $searchCase
    ){
    }

    public function search(ResourceFileXdbContentGetter $contentGetter, ParseSearchStringTypeEnum $type): ?string
    {
        /** @var SearchStrategyInterface $case */
        foreach ($this->searchCase as $case) {
            $txtFile = $case->search($contentGetter, $type);
            if ($txtFile && $this->exists($txtFile)) {
                return $txtFile;
            }
        }

        return null;
    }
}