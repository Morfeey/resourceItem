<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Symfony\Resources;

use App\Bundles\ResourceItemBundle\Infrastructure\Symfony\DependencyInjection\ResourceItemBundleExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ResourceItemBundle extends Bundle
{
    public function getPath(): string
    {
        return __DIR__ . '/../..';
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new ResourceItemBundleExtension();
    }
}