<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Presenter;

use App\Bundles\InfrastructureBundle\Infrastructure\Prototype\PrototypeInterface;

class ResourceItemPresenter implements PrototypeInterface
{
    protected int $id;
    protected int $resourceId;
    protected ?string $name;
    protected ?string $description;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getResourceId(): int
    {
        return $this->resourceId;
    }

    /**
     * @param int $resourceId
     *
     * @return self
     */
    public function setResourceId(int $resourceId): static
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
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }
}