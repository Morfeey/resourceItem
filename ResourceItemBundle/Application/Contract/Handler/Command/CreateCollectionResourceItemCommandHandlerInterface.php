<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Handler\Command;

use App\Bundles\ResourceItemBundle\Application\Contract\Command\CreateCollectionResourceItemCommand;

interface CreateCollectionResourceItemCommandHandlerInterface
{
    public function __invoke(CreateCollectionResourceItemCommand $command);
}