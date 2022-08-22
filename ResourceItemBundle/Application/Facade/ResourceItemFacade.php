<?php

namespace App\Bundles\ResourceItemBundle\Application\Facade;

use App\Bundles\InfrastructureBundle\Application\Contract\Bus\CommandBusInterface;
use App\Bundles\InfrastructureBundle\Application\Contract\Bus\QueryBusInterface;
use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Facade\ResourceItemFacadeInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Query\FindByLikeNameQuery;

class ResourceItemFacade implements ResourceItemFacadeInterface
{
    public function __construct
    (
        protected readonly QueryBusInterface $queryBus,
        protected readonly CommandBusInterface $commandBus
    ){
    }

    /**
     * @inheritDoc
     */
    public function findByLikeName(string $name): CollectionInterface
    {
        return $this->queryBus->execute((new FindByLikeNameQuery($name)));
    }
}