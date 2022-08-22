<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Handler\Command;

use App\Bundles\ResourceItemBundle\Application\Contract\Command\CreateResourceItemCommand;

interface CreateResourceItemCommandHandlerInterface
{
    public function __invoke(CreateResourceItemCommand $command);
}