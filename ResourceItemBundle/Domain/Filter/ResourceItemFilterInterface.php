<?php

namespace App\Bundles\ResourceItemBundle\Domain\Filter;

use App\Bundles\InfrastructureBundle\Domain\Filter\DomainFilterInterface;

interface ResourceItemFilterInterface extends DomainFilterInterface
{
    public function getId(): ?int;
    public function setId(int $id): static;

    public function getName(): ?string;
    public function setName(string $name): static;

    public function getResourceId(): ?int;
    public function setResourceId(int $resourceId): static;

    public function getDescription(): ?string;
    public function setDescription(string $description): static;
}