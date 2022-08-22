<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Search;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\ResourceFileXdbContentGetter;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Search\Enum\ParseSearchStringTypeEnum;

interface SearchStrategyInterface
{
    public function search(ResourceFileXdbContentGetter $contentGetter, ParseSearchStringTypeEnum $type): ?string;
}