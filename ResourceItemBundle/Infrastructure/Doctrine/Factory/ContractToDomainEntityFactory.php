<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Doctrine\Factory;

use App\Bundles\InfrastructureBundle\Infrastructure\Factory\DefaultPrototypeFactory;
use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\Collection;
use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Entity\ContractEntityInterface;
use App\Bundles\ResourceItemBundle\Domain\Entity\ResourceItemEntityInterface;
use App\Bundles\ResourceItemBundle\Infrastructure\Doctrine\Entity\ResourceItem;
use App\Bundles\ResourceItemBundle\Infrastructure\Factory\ContractToDomainEntityFactoryInterface;

class ContractToDomainEntityFactory extends DefaultPrototypeFactory implements ContractToDomainEntityFactoryInterface
{
    public function mapping(ContractEntityInterface $contractEntity): ResourceItemEntityInterface
    {
        return
            $this->createPrototype()
                ->setId($contractEntity->getId())
                ->setResourceId($contractEntity->getResourceId())
                ->setName($contractEntity->getName())
                ->setDescription($contractEntity->getDescription())
            ;
    }

    public function mappingCollection(CollectionInterface $collection): CollectionInterface
    {
        return Collection::createFrom(
            $collection->map(function (ContractEntityInterface $contractEntity) {
                return $this->mapping($contractEntity);
            })
        );
    }

    protected function createPrototype(): ResourceItem
    {
        $this->prototype = $this->prototype ?? new ResourceItem();

        return clone $this->prototype;
    }
}