<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler;

use Generator;

class ResourceItemParserHandlerByResourceFile extends DefaultResourceItemHandler
{
    public function getCount(): int
    {
        return 0;
    }

    public function collectionGenerator(): Generator
    {
        yield true;
    }
}