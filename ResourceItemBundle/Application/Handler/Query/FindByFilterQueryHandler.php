<?php

namespace App\Bundles\ResourceItemBundle\Application\Handler\Query;

use App\Bundles\InfrastructureBundle\Application\Contract\Handler\QueryHandlerInterface;
use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Query\FindByFilterQueryHandlerInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Query\FindByFilterQuery;
use App\Bundles\ResourceItemBundle\Application\Factory\ResourceItemQueryResponseFactory;
use App\Bundles\ResourceItemBundle\Domain\Repository\ResourceItemRepositoryInterface;

class FindByFilterQueryHandler implements FindByFilterQueryHandlerInterface, QueryHandlerInterface
{
    public function __construct(
        protected readonly ResourceItemRepositoryInterface $resourceItemRepository,
        protected readonly ResourceItemQueryResponseFactory $responseFactory
    ){
    }

    /**
     * @inheritDoc
     */
    public function __invoke(FindByFilterQuery $query): CollectionInterface
    {
        return $this->responseFactory->mappingCollection(
            $this->resourceItemRepository->findByFilter($query->getFilter())
        );
    }
}