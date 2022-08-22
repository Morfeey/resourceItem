<?php

namespace App\Bundles\ResourceItemBundle\Application\Handler\Command;

use App\Bundles\InfrastructureBundle\Application\Contract\Handler\CommandHandlerInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Command\CreateResourceItemCommand;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Command\CreateResourceItemCommandHandlerInterface;
use App\Bundles\ResourceItemBundle\Domain\Repository\ResourceItemRepositoryInterface;
use App\Bundles\ResourceItemBundle\Infrastructure\Factory\ContractToDomainEntityFactoryInterface;

class CreateResourceItemCommandHandler implements CreateResourceItemCommandHandlerInterface, CommandHandlerInterface
{
    public function __construct
    (
        protected readonly ResourceItemRepositoryInterface $repository,
        protected readonly ContractToDomainEntityFactoryInterface $factory
    ){
    }

    public function __invoke(CreateResourceItemCommand $command)
    {
        $this->repository->save(
            $this->factory->mapping($command)
        );
    }
}