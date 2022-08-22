<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Factory;

use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Entity\ContractEntityInterface;
use App\Bundles\ResourceItemBundle\Domain\Entity\ResourceItemEntityInterface;

interface ContractToDomainEntityFactoryInterface
{
    public function mapping(ContractEntityInterface $contractEntity): ResourceItemEntityInterface;

    /**
     * @param CollectionInterface<int, ContractEntityInterface> $collection
     * @return CollectionInterface<ResourceItemEntityInterface>
     */
    public function mappingCollection(CollectionInterface $collection): CollectionInterface;
}