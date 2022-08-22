<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Handler\Command;

use App\Bundles\ResourceItemBundle\Application\Contract\Command\DeleteResourceItemCommand;

interface DeleteResourceItemCommandHandlerInterface
{
    public function __invoke(DeleteResourceItemCommand $command);
}