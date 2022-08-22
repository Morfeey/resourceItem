<?php

namespace App\Bundles\ResourceItemBundle\Application\Handler\Query;

use App\Bundles\InfrastructureBundle\Application\Contract\Handler\QueryHandlerInterface;
use App\Bundles\InfrastructureBundle\Infrastructure\Doctrine\Filter\Enum\FilterTypeEnum;
use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Query\FindByFilterQueryHandlerInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Query\FindByLikeNameQueryHandlerInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Query\FindByLikeNameQuery;
use App\Bundles\ResourceItemBundle\Application\Contract\Filter\ResourceItemFilterContract;
use App\Bundles\ResourceItemBundle\Application\Contract\Query\FindByFilterQuery;

class FindByLikeNameQueryHandler implements FindByLikeNameQueryHandlerInterface, QueryHandlerInterface
{
    public function __construct
    (
        protected readonly FindByFilterQueryHandlerInterface $findByFilterQueryHandler
    ){
    }

    public function __invoke(FindByLikeNameQuery $query): CollectionInterface
    {
        $filter =
            (new ResourceItemFilterContract())
                ->setFilterType(FilterTypeEnum::LIKE)
                ->setName($query->getName())
        ;

        return $this->findByFilterQueryHandler->__invoke(new FindByFilterQuery($filter));
    }
}