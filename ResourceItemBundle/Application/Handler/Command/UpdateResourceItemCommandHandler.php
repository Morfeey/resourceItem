<?php

namespace App\Bundles\ResourceItemBundle\Application\Handler\Command;

use App\Bundles\InfrastructureBundle\Application\Contract\Handler\CommandHandlerInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Command\UpdateResourceItemCommand;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Command\UpdateResourceItemCommandHandlerInterface;
use App\Bundles\ResourceItemBundle\Domain\Repository\ResourceItemRepositoryInterface;
use App\Bundles\ResourceItemBundle\Infrastructure\Factory\ContractToDomainEntityFactoryInterface;

class UpdateResourceItemCommandHandler implements CommandHandlerInterface, UpdateResourceItemCommandHandlerInterface
{
    public function __construct
    (
        protected readonly ResourceItemRepositoryInterface $repository,
        protected readonly ContractToDomainEntityFactoryInterface $factory
    ){
    }

    public function __invoke(UpdateResourceItemCommand $command)
    {
        $this->repository->save(
            $this->factory->mapping($command)
        );
    }
}