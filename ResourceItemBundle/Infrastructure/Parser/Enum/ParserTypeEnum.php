<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Enum;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ResourceItemParserHandlerByFiles;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ResourceItemParserHandlerByResourceFile;

enum ParserTypeEnum: int
{
    case byFiles = 1;
    case byResourceIdFile = 2;

    public function getClassName(): string
    {
        return match($this){
            self::byFiles => ResourceItemParserHandlerByFiles::class,
            self::byResourceIdFile => ResourceItemParserHandlerByResourceFile::class
        };
    }
}