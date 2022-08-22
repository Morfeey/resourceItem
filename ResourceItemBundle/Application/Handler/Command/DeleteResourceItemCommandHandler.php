<?php

namespace App\Bundles\ResourceItemBundle\Application\Handler\Command;

use App\Bundles\InfrastructureBundle\Application\Contract\Handler\CommandHandlerInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Command\DeleteResourceItemCommand;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Command\DeleteResourceItemCommandHandlerInterface;
use App\Bundles\ResourceItemBundle\Domain\Repository\ResourceItemRepositoryInterface;

class DeleteResourceItemCommandHandler implements DeleteResourceItemCommandHandlerInterface, CommandHandlerInterface
{
    public function __construct
    (
        protected readonly ResourceItemRepositoryInterface $repository
    ){
    }

    public function __invoke(DeleteResourceItemCommand $command)
    {
        $this->repository->deleteByFilter($command->getFilter());
    }
}