<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler;
use Generator;

interface ResourceItemParserHandlerInterface
{
    public function getCount(): int;

    /**
     * @return Generator<bool>
     */
    public function collectionGenerator(): Generator;
}