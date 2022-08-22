<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\View;

use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Application\Contract\Facade\ResourceItemFacadeInterface;
use App\Bundles\ResourceItemBundle\Infrastructure\Factory\ResourceItemPresenterFactory;
use App\Bundles\ResourceItemBundle\Ui\View\ResourceItemFindByNameLikeViewInterface;

class ResourceItemFindByNameLikeView implements ResourceItemFindByNameLikeViewInterface
{
    public function __construct
    (
        protected readonly ResourceItemFacadeInterface $facade,
        protected readonly ResourceItemPresenterFactory $factory
    ){
    }

    public function __invoke(string $searchString): CollectionInterface
    {
        return $this->factory->mappingCollection(
            $this->facade->findByLikeName($searchString)
        );
    }
}