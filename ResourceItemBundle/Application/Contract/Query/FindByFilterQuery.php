<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Query;

use App\Bundles\InfrastructureBundle\Application\Contract\Query\QueryInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Filter\ResourceItemFilterContract;

class FindByFilterQuery implements QueryInterface
{
    public function __construct(protected readonly ResourceItemFilterContract $filter)
    {
    }

    /**
     * @return ResourceItemFilterContract
     */
    public function getFilter(): ResourceItemFilterContract
    {
        return $this->filter;
    }
}