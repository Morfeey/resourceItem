<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Facade;

use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Query\Response\QueryResponseInterface;

interface ResourceItemFacadeInterface
{
    /**
     * @param string $name
     *
     * @return CollectionInterface<int, QueryResponseInterface>
     */
    public function findByLikeName(string $name): CollectionInterface;
}