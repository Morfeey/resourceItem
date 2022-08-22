<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Helper\ResourceItemHelper;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\XdbFilesService;
use Generator;
use Throwable;

class ResourceItemParserHandlerByFiles extends DefaultResourceItemHandler
{
    public const DIRECTORY_ROOT_AND_BACK_TO_SERVER = '/../../Game/Unpacked/Server/';
    public const DIRECTORY_XDB = 'game/data/Packs';
    public const DIRECTORY_EXTRACTED_TEXT = 'game/data/ExtractedPackLoc';

    protected array $listFiles;

    public function __construct
    (
        protected readonly XdbFilesService $xdbFilesService,
        protected readonly ResourceItemHelper $helper
    ){
        $this->listFiles = $this->xdbFilesService->getFiles();
    }

    public function getCount(): int
    {
        return count($this->listFiles);
    }

    /**
     * @throws Throwable
     * @return Generator<bool>
     */
    public function collectionGenerator(): Generator
    {
        try {
            $this->helper->repository()->beginTransaction()->clearTable();
            $lastKey = array_key_last($this->listFiles);
            foreach ($this->listFiles as $key => $file) {
                $resource = $this->helper->createByFilename($file);
                if (!$resource) {
                    yield false;
                    continue;
                }

                $this->helper->save($resource, $lastKey === $key);
                yield true;
            }

            $this->helper->repository()->commit();
        }catch (Throwable $exception) {
            $this->helper->repository()->rollback();
            throw $exception;
        }
    }
}