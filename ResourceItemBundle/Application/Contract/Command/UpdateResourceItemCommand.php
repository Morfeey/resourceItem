<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Command;

use App\Bundles\InfrastructureBundle\Application\Contract\Command\CommandInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Entity\ContractEntityInterface;

class UpdateResourceItemCommand implements CommandInterface, ContractEntityInterface
{
    protected int $id;
    protected int $resourceId;
    protected ?string $name;
    protected ?string $description;

    /**
     * @param int $id
     * @param int $resourceId
     * @param string|null $name
     * @param string|null $description
     */
    public function __construct(int $id, int $resourceId, ?string $name, ?string $description)
    {
        $this->id = $id;
        $this->resourceId = $resourceId;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getResourceId(): int
    {
        return $this->resourceId;
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