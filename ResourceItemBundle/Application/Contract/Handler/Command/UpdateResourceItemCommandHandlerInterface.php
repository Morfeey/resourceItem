<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Handler\Command;

use App\Bundles\ResourceItemBundle\Application\Contract\Command\UpdateResourceItemCommand;

interface UpdateResourceItemCommandHandlerInterface
{
    public function __invoke(UpdateResourceItemCommand $command);
}