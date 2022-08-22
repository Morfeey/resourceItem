<?php

namespace App\Bundles\ResourceItemBundle\Ui\View;

use App\Bundles\InfrastructureBundle\Infrastructure\Helper\ArrayCollection\CollectionInterface;
use App\Bundles\ResourceItemBundle\Infrastructure\Presenter\ResourceItemPresenter;

interface ResourceItemFindByNameLikeViewInterface
{
    /**
     * @param string $searchString
     * @return CollectionInterface<int, ResourceItemPresenter>
     */
    public function __invoke(string $searchString): CollectionInterface;
}