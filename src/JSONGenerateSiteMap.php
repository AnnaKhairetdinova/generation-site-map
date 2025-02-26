<?php

declare(strict_types=1);

namespace GenerationSiteMap;

use GenerationSiteMap\Interface\GenerateSiteMapInterface;

class JSONGenerateSiteMap implements GenerateSiteMapInterface
{
    public function generate(array $siteMapObject): string|bool
    {
        return json_encode($siteMapObject);
    }
}
