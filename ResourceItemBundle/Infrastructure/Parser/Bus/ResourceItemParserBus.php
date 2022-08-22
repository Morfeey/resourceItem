<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Bus;

use App\Bundles\InfrastructureBundle\Infrastructure\Exception\DefaultException;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Enum\ParserTypeEnum as ParserType;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ResourceItemParserHandlerInterface;

class ResourceItemParserBus implements ResourceItemParserBusInterface
{
    public function __construct(protected readonly iterable $parserCollection)
    {
    }

    /**
     * @throws DefaultException
     */
    public function createHandlerByType(ParserType $type = ParserType::byFiles): ResourceItemParserHandlerInterface
    {
        foreach ($this->parserCollection as $parser) {
            if (get_class($parser) !== $type->getClassName()) {
                continue;
            }

            return $parser;
        }

        throw new DefaultException('Resource item handler not found');
    }
}