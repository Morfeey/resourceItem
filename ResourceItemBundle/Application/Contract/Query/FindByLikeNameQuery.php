<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Query;

use App\Bundles\InfrastructureBundle\Application\Contract\Query\QueryInterface;

class FindByLikeNameQuery implements QueryInterface
{
    public function __construct(protected readonly string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}