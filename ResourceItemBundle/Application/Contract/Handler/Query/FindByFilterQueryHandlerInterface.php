<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Handler\Query;

use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Query\Response\QueryResponseInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Query\FindByFilterQuery;

interface FindByFilterQueryHandlerInterface
{
    /**
     * @param FindByFilterQuery $query
     * @return CollectionInterface<int, QueryResponseInterface>
     */
    public function __invoke(FindByFilterQuery $query): CollectionInterface;
}