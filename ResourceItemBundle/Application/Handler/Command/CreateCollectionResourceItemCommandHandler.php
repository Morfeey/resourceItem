<?php

namespace App\Bundles\ResourceItemBundle\Application\Handler\Command;

use App\Bundles\InfrastructureBundle\Application\Contract\Handler\CommandHandlerInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Command\CreateCollectionResourceItemCommand;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Command\CreateCollectionResourceItemCommandHandlerInterface;
use App\Bundles\ResourceItemBundle\Domain\Repository\ResourceItemRepositoryInterface;
use App\Bundles\ResourceItemBundle\Infrastructure\Factory\ContractToDomainEntityFactoryInterface;

class CreateCollectionResourceItemCommandHandler
    implements CommandHandlerInterface, CreateCollectionResourceItemCommandHandlerInterface
{
    public function __construct
    (
        protected readonly ResourceItemRepositoryInterface $resourceItemRepository,
        protected readonly ContractToDomainEntityFactoryInterface $factory
    ){
    }

    public function __invoke(CreateCollectionResourceItemCommand $command)
    {
        $this->resourceItemRepository->saveCollection(
            $this->factory->mappingCollection($command->getCollection())
        );
    }
}