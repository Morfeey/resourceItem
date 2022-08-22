<?php

namespace App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Handler\ByFiles\Service\Search\Enum\ParseSearchStringTypeEnum;

class ResourceFileXdbContentGetter
{
    protected array $content = [];
    protected string $filename = '';

    public function getResourceId(): ?int
    {
        return !empty($this->content['Header']['resourceId']) ? (int) $this->content['Header']['resourceId'] : null;
    }

    public function getNamingContentBySearchType(ParseSearchStringTypeEnum $searchType): ?string
    {
        $cases = [strtolower($searchType->name), $searchType->name];
        foreach ($cases as $case) {
            $content = $this->content[$case]['@attributes']['href'] ?? null;
            if ($content) {
                return $content;
            }
        }

        return null;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function generateContent(string $fileName): static
    {
        $this->filename = $fileName;
        $content = file_exists($fileName) ? file_get_contents($fileName) : [];
        if (!$content) {
            return $this;
        }

        $xml = simplexml_load_string($content, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $this->content = json_decode($json, true);

        return $this;
    }

    public function isCreatedContent(): bool
    {
        return $this->content !== [] && $this->filename !== '';
    }
}