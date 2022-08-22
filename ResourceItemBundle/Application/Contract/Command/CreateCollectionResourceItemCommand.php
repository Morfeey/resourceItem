<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Command;

use App\Bundles\InfrastructureBundle\Application\Contract\Command\CommandInterface;
use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;

class CreateCollectionResourceItemCommand implements CommandInterface
{
    /**
     * @param CollectionInterface<int, CreateResourceItemCommand> $collection
     */
    public function __construct(protected readonly CollectionInterface $collection)
    {
    }

    public function getCollection(): CollectionInterface
    {
        return $this->collection;
    }
}