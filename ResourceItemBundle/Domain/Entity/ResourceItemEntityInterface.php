<?php

namespace App\Bundles\ResourceItemBundle\Domain\Entity;

use App\Bundles\InfrastructureBundle\Domain\Entity\DomainEntityInterface;

interface ResourceItemEntityInterface extends DomainEntityInterface
{
    public function getId(): ?int;
    public function getResourceId(): int;
    public function getName(): ?string;
    public function getDescription(): ?string;

    public function setId(int $id): static;
    public function setResourceId(int $resourceId): static;
    public function setName(string $name): static;
    public function setDescription(string $description): static;
}