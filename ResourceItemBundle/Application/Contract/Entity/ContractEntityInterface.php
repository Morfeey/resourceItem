<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Entity;

interface ContractEntityInterface
{
    public function getId(): ?int;
    public function getResourceId(): int;
    public function getName(): ?string;
    public function getDescription(): ?string;
}