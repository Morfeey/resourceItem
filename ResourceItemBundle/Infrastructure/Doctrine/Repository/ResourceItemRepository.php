<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Doctrine\Repository;

use App\Bundles\InfrastructureBundle\Infrastructure\Doctrine\Filter\Enum\FilterTypeEnum;
use App\Bundles\InfrastructureBundle\Infrastructure\Doctrine\Filter\FilterEntityInterface;
use App\Bundles\InfrastructureBundle\Infrastructure\Doctrine\Orm\CustomRepository;
use App\Bundles\ResourceItemBundle\Domain\Filter\ResourceItemFilterInterface;
use App\Bundles\ResourceItemBundle\Domain\Repository\ResourceItemRepositoryInterface;
use App\Bundles\ResourceItemBundle\Infrastructure\Doctrine\Entity\ResourceItem;
use Doctrine\DBAL\ParameterType;
use Doctrine\ORM\QueryBuilder as DoctrineQueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

class ResourceItemRepository extends CustomRepository implements ResourceItemRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResourceItem::class);
    }

    /**
     * @param DoctrineQueryBuilder $queryBuilder
     * @param ResourceItemFilterInterface $filter
     * @return DoctrineQueryBuilder
     */
    protected function buildQuery(DoctrineQueryBuilder $queryBuilder, FilterEntityInterface $filter): DoctrineQueryBuilder
    {
        $queryConditions = [
            ResourceItem::C_NAME => $filter->getName(),
            ResourceItem::C_DESCRIPTION => $filter->getDescription(),
            ResourceItem::C_RESOURCE_ID => $filter->getResourceId(),
            ResourceItem::C_ID =>  $filter->getId()
        ];

        $prefix = ResourceItem::PREFIX . '.';
        foreach ($queryConditions as $fieldName => $condition) {
            if ($condition === null) {
                continue;
            }

            //TODO Нужно сделать лайк через :fieldName, пока не работает и втыкаю как есть
            if ($filter->getFilterType() === FilterTypeEnum::LIKE) {
                $queryBuilder->andWhere()->where(
                    $queryBuilder->expr()->like(
                        $prefix . $fieldName,
                        $queryBuilder->expr()->literal("%{$condition}%")
                    )
                );
            }

            if ($filter->getFilterType() === FilterTypeEnum::EQUALS) {
                $queryBuilder->andWhere()->where(
                    $queryBuilder->expr()->eq($prefix . $fieldName, ":$fieldName")
                )
                    ->setParameter($fieldName, $condition, $this->getType($condition))
                ;
            }
        }

        return $queryBuilder;
    }

    protected function getType(mixed $condition): ?int
    {
        $type = null;
        if (is_string($condition)) {
            $type = ParameterType::STRING;
        }

        if (is_int($condition)) {
            $type = ParameterType::INTEGER;
        }

        if (is_bool($condition)) {
            $type = ParameterType::BOOLEAN;
        }

        return $type;
    }
}