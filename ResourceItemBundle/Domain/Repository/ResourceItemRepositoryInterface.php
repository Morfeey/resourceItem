<?php

namespace App\Bundles\ResourceItemBundle\Domain\Repository;

use App\Bundles\InfrastructureBundle\Domain\Filter\DomainFilterInterface;
use App\Bundles\InfrastructureBundle\Domain\Repository\DomainRepositoryInterface;
use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Domain\Entity\ResourceItemEntityInterface;

/**
 * @method save(ResourceItemEntityInterface $customEntity)
 * @method saveCollection(CollectionInterface|ResourceItemEntityInterface[] $collection, bool $inTransaction = false)
 * @method ResourceItemEntityInterface create()
 */
interface ResourceItemRepositoryInterface extends DomainRepositoryInterface
{
    public function findByFilter(DomainFilterInterface $filter): CollectionInterface;
}