<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Handler\Query\Response;

use App\Bundles\ResourceItemBundle\Application\Contract\Entity\ContractEntityInterface;

interface QueryResponseInterface extends ContractEntityInterface
{
    public function getId(): int;
}