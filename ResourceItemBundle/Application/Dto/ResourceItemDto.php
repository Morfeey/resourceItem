<?php

namespace App\Bundles\ResourceItemBundle\Application\Dto;

use App\Bundles\InfrastructureBundle\Infrastructure\Prototype\PrototypeInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Handler\Query\Response\QueryResponseInterface;

class ResourceItemDto implements PrototypeInterface, QueryResponseInterface
{
    public function __construct
    (
        protected readonly int $resourceId,
        protected readonly ?int $id,
        protected readonly ?string $name,
        protected readonly ?string $description
    ){
    }

    /**
     * @return int
     */
    public function getResourceId(): int
    {
        return $this->resourceId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
}