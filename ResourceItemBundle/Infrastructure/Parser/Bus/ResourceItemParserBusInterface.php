<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Bus;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Enum\ParserTypeEnum as ParserType;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ResourceItemParserHandlerInterface;

interface ResourceItemParserBusInterface
{
    public function createHandlerByType(ParserType $type = ParserType::byFiles): ResourceItemParserHandlerInterface;
}