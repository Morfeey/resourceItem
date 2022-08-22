<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Symfony\DependencyInjection;

use App\Bundles\InfrastructureBundle\Infrastructure\Symfony\DependencyInjection\DefaultBundleExtension;

class ResourceItemBundleExtension extends DefaultBundleExtension
{
    public function getCurrentDir(): string
    {
        return __DIR__;
    }
}