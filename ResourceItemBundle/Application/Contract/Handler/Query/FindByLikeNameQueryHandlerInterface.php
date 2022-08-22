<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Handler\Query;

use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Query\Response\QueryResponseInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Query\FindByLikeNameQuery;

interface FindByLikeNameQueryHandlerInterface
{
    /**
     * @param FindByLikeNameQuery $query
     *
     * @return CollectionInterface<int, QueryResponseInterface>
     */
    public function __invoke(FindByLikeNameQuery $query): CollectionInterface;
}