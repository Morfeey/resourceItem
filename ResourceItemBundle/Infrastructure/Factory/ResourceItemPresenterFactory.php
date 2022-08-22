<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Factory;

use App\Bundles\InfrastructureBundle\Infrastructure\Factory\DefaultPrototypeFactory;
use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\Collection;
use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Query\Response\QueryResponseInterface;
use App\Bundles\ResourceItemBundle\Infrastructure\Presenter\ResourceItemPresenter;

class ResourceItemPresenterFactory extends DefaultPrototypeFactory
{
    public function createPrototype(): ResourceItemPresenter
    {
        $this->prototype = $this->prototype ?? new ResourceItemPresenter();

        return clone $this->prototype;
    }

    public function mapping(QueryResponseInterface $queryResponse): ResourceItemPresenter
    {
        return
            $this->createPrototype()
                ->setId($queryResponse->getId())
                ->setResourceId($queryResponse->getResourceId())
                ->setName($queryResponse->getName())
                ->setDescription($queryResponse->getDescription())
        ;
    }

    /**
     * @param CollectionInterface<int, QueryResponseInterface> $collection
     *
     * @return CollectionInterface<int, ResourceItemPresenter>
     */
    public function mappingCollection(CollectionInterface $collection): CollectionInterface
    {
        return new Collection(
            array_map(
                function (QueryResponseInterface $item) {
                    return $this->mapping($item);
                },
                $collection->toArray()
            )
        );
    }
}