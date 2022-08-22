<?php

namespace App\Bundles\ResourceItemBundle\Application\Factory;

use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\Collection;
use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Query\Response\QueryResponseInterface;
use App\Bundles\ResourceItemBundle\Application\Dto\ResourceItemDto;
use App\Bundles\ResourceItemBundle\Domain\Entity\ResourceItemEntityInterface;

class ResourceItemQueryResponseFactory
{
    public function mapping(ResourceItemEntityInterface $entity): QueryResponseInterface
    {
        return
            new ResourceItemDto(
                $entity->getResourceId(),
                $entity->getId(),
                $entity->getName(),
                $entity->getDescription()
            );
    }

    /**
     * @param CollectionInterface<int, ResourceItemEntityInterface> $collection
     * @return CollectionInterface<int, QueryResponseInterface>
     */
    public function mappingCollection(CollectionInterface $collection): CollectionInterface
    {
        return Collection::createFrom(
            $collection->map(function (ResourceItemEntityInterface $entity) {
                return $this->mapping($entity);
            })
        );
    }
}