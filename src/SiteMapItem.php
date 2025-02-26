<?php

declare(strict_types=1);

namespace GenerationSiteMap;

class SiteMapItem
{
    public function __construct(
        public string $loc,
        public string $lastMod,
        public float  $priority,
        public string $changefreq,
    ) {
    }

    public function getLastMod(): string
    {
        return $this->lastMod;
    }

    public function getPriority(): float
    {
        return $this->priority;
    }

    public function getChangefreq(): string
    {
        return $this->changefreq;
    }

    public function getLoc(): string
    {
        return $this->loc;
    }
}
