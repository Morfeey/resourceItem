<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Filter;

use App\Bundles\InfrastructureBundle\Infrastructure\Doctrine\Filter\DefaultFilter;
use App\Bundles\ResourceItemBundle\Domain\Filter\ResourceItemFilterInterface;

class ResourceItemFilterContract extends DefaultFilter implements ResourceItemFilterInterface
{
    protected ?int $id;
    protected ?int $resourceId;
    protected ?string $name;
    protected ?string $description;

    public function __construct()
    {
        $this->id = null;
        $this->resourceId = null;
        $this->name = null;
        $this->description = null;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     *
     * @return self
     */
    public function setId(?int $id): static
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getResourceId(): ?int
    {
        return $this->resourceId;
    }

    /**
     * @param int|null $resourceId
     *
     * @return self
     */
    public function setResourceId(?int $resourceId): static
    {
        $this->resourceId = $resourceId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function isEmpty(): bool
    {
        $this->name = $this->name ? trim($this->name) : $this->name;
        $this->description = $this->description ? trim($this->description) : $this->description;

        return
            ($this->name === null || $this->name === '')
            && ($this->description === null || $this->description === '')
            && $this->resourceId === null
            && $this->id === null
        ;
    }
}