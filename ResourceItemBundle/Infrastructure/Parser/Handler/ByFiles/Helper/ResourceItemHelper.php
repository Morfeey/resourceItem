<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Helper;

use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\Collection;
use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Domain\Entity\ResourceItemEntityInterface;
use App\Bundles\ResourceItemBundle\Domain\Repository\ResourceItemRepositoryInterface;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\DescriptionService;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\NameService;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\ResourceFileXdbContentGetter;

class ResourceItemHelper
{
    protected const INSERT_MAX = 500;

    protected CollectionInterface $collection;

    public function __construct
    (
        protected readonly ResourceItemRepositoryInterface $repository,
        protected readonly ResourceFileXdbContentGetter $resourceFileXdbContentGetter,
        protected readonly DescriptionService $descriptionService,
        protected readonly NameService $nameService
    ){
        $this->collection = Collection::createFrom([]);
    }

    public function createByFilename(string $filename): ?ResourceItemEntityInterface
    {
        $resourceGetter = $this->resourceFileXdbContentGetter->generateContent($filename);
        if (!$resourceId = $resourceGetter->getResourceId()) {
            return null;
        }

        return
            $this->repository->create()
                ->setResourceId($resourceId)
                ->setName($this->nameService->get($resourceGetter))
                ->setDescription($this->descriptionService->get($resourceGetter))
        ;
    }

    public function repository(): ResourceItemRepositoryInterface
    {
        return $this->repository;
    }

    public function save(ResourceItemEntityInterface $entity, bool $isLast = false): static
    {
        if ($this->collection->count() < self::INSERT_MAX && !$isLast) {
            $this->collection->add($entity);
            return $this;
        }

        if ($this->collection->count() === self::INSERT_MAX || $isLast) {
            $this->repository->saveCollection($this->collection);
            $this->collection->clear();
        }

        return $this;
    }
}