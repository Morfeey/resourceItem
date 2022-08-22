<?php

namespace App\Bundles\ResourceItemBundle\Application\Contract\Command;

use App\Bundles\InfrastructureBundle\Application\Contract\Command\CommandInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Entity\ContractEntityInterface;

class CreateResourceItemCommand implements CommandInterface, ContractEntityInterface
{
    protected int $resourceId;
    protected ?string $name;
    protected ?string $description;

    /**
     * @param int $resourceId
     * @param string|null $name
     * @param string|null $description
     */
    public function __construct(int $resourceId, ?string $name, ?string $description)
    {
        $this->resourceId = $resourceId;
        $this->name = $name;
        $this->description = $description;
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

    /**
     * @deprecated
     */
    public function getId(): ?int
    {
        return null;
    }
}