<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Helper;

use App\Bundles\InfrastructureBundle\Infrastructure\Helper\Path\Directory;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Search\Enum\ParseSearchStringTypeEnum;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ResourceItemParserHandlerByFiles;

trait FileHelper
{
    use StringValuePrototypeTrait;
    public function exists(string $filename): bool
    {
        return file_exists($filename);
    }

    public function getContent(string $filename): ?string
    {
        return
            file_exists($filename)
                ? file_get_contents($filename) ?: null
                : null
        ;
    }

    public function createDefaultExtractedFileName(string $filename, ParseSearchStringTypeEnum $parseType): string
    {
        $stringValue = $this->createPrototypeStringValue()->setString($filename);
        if ($stringValue->endsWith('.xdb')) {
            $stringValue->replace('.xdb', $parseType->name . '.txt');
        }

        $archiveName = $this->archiveNameByFileName($filename);
        if ($archiveName) {
            $stringValue->replace($archiveName, DIRECTORY_SEPARATOR);
        }

        return
            $stringValue
                ->replace(ResourceItemParserHandlerByFiles::DIRECTORY_XDB, ResourceItemParserHandlerByFiles::DIRECTORY_EXTRACTED_TEXT)
                ->getResult()
            ;
    }

    public function getExtractedExtension(): string
    {
        return 'txt';
    }

    public function archiveNameByFileName(string $filename): ?string
    {
        foreach (explode(DIRECTORY_SEPARATOR, $filename) as $value) {
            $value = $this->createPrototypeStringValue()->setString($value);
            if ($value->isContains('XDB_') && $value->isContains('.Server')) {
                return $value->getResult();
            }
        }

        return null;
    }

    public static function getDirectoryXdbFiles(): string
    {
        return Directory::getDocumentRoot() . ResourceItemParserHandlerByFiles::DIRECTORY_ROOT_AND_BACK_TO_SERVER . ResourceItemParserHandlerByFiles::DIRECTORY_XDB;
    }

    public static function getDirectoryExtracted(): string
    {
        return str_replace(ResourceItemParserHandlerByFiles::DIRECTORY_XDB, ResourceItemParserHandlerByFiles::DIRECTORY_EXTRACTED_TEXT, self::getDirectoryXdbFiles());
    }
}