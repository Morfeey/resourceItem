<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Doctrine\Entity;

use App\Bundles\InfrastructureBundle\Infrastructure\Doctrine\Entity\CustomEntityInterface;
use App\Bundles\ResourceItemBundle\Domain\Entity\ResourceItemEntityInterface;
use App\Bundles\ResourceItemBundle\Infrastructure\Doctrine\Repository\ResourceItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResourceItemRepository::class)]
#[ORM\Table(name: 'resource_item')]
class ResourceItem implements CustomEntityInterface, ResourceItemEntityInterface
{
    public const PREFIX = 'ri';
    public const C_ID = 'id';
    public const C_NAME = 'name';
    public const C_RESOURCE_ID = 'resourceId';
    public const C_DESCRIPTION = 'description';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'bigint', length: 20)]
    protected int $id;

    #[ORM\Column(name: 'resource_id', type: 'bigint', unique: true, nullable: false)]
    protected int $resourceId;

    #[ORM\Column(name: 'name', type: 'string', nullable: true, options: ['default' => null])]
    protected ?string $name;

    #[ORM\Column(name: 'description', type: 'string', nullable: true, options: ['default' => null])]
    protected ?string $description;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getResourceId(): int
    {
        return $this->resourceId;
    }

    public function setResourceId(int $resourceId): static
    {
        $this->resourceId = $resourceId;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public static function prefix(): string
    {
        return self::PREFIX;
    }
}