<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Search\Enum\ParseSearchStringTypeEnum;

class DescriptionService extends DefaultParseStringService
{
    public function getType(): ParseSearchStringTypeEnum
    {
        return ParseSearchStringTypeEnum::Description;
    }
}