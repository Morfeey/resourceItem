<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Content;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Helper\ContentHelper;
use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Helper\FileHelper;

class ContentCorrectorHref implements ContentCorrectorInterface
{
    use FileHelper, ContentHelper;
    public function correct(string $content): string
    {
        if (!$this->hasHref($content)) {
            return $content;
        }

        $contents = [];
        foreach ($this->getHrefFiles($content) as $file) {
            if (!$this->exists($file) || !$contentFile = $this->getContent($file)) {
                continue;
            }

            $contents[] = $this->decode($contentFile);
        }

        return implode(' ', $contents);
    }

    protected function getHrefFiles(string $content): array
    {
        $files = [];
        $explode = explode('href', $content);
        foreach($explode as $value) {
            $positionStart = stripos($value, '="');
            $positionFinish = stripos($value, 'txt"');
            if (!$positionStart && !$positionFinish) {
                continue;
            }
            $file = substr($value, $positionStart + 2, $positionFinish + 1);
            $files[] = $this->correctFile($file);
        }

        return $files;
    }

    protected function correctFile(string $file): string
    {
        return self::getDirectoryExtracted(). $file;
    }

    protected function hasHref(string $content): bool
    {
        return stripos($content, 'href') !== false;
    }
}