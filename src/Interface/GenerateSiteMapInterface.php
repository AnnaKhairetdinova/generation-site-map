<?php

declare(strict_types=1);

namespace GenerationSiteMap\Interface;

interface GenerateSiteMapInterface
{
    public function generate(array $siteMapObject): string|bool;
}
