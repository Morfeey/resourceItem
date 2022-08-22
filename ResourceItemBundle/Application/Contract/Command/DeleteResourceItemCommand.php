<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Command;

use App\Bundles\InfrastructureBundle\Application\Contract\Command\CommandInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Filter\ResourceItemFilterContract;

class DeleteResourceItemCommand implements CommandInterface
{
    public function __construct(protected readonly ResourceItemFilterContract $filter)
    {
    }

    public function getFilter(): ResourceItemFilterContract
    {
        return $this->filter;
    }
}