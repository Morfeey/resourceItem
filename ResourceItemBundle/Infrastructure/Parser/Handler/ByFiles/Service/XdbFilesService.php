<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service;

use App\Bundles\InfrastructureBundle\Infrastructure\Helper\Path\Directory;
use App\Bundles\InfrastructureBundle\Infrastructure\Helper\Path\SearchType;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Helper\FileHelper;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ResourceItemParserHandlerByFiles;

class XdbFilesService
{
    use FileHelper;
    public function getFiles(): array
    {
        return (new Directory(self::getDirectoryXdbFiles()))->getFiles('*.xdb', SearchType::searchRecurse());
    }
}