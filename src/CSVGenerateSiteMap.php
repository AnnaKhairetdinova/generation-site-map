<?php

declare(strict_types=1);

namespace GenerationSiteMap;

use GenerationSiteMap\Interface\GenerateSiteMapInterface;

class CSVGenerateSiteMap implements GenerateSiteMapInterface
{

    public function generate(array $siteMapObject): string|bool
    {
        $output = fopen('php://temp', 'r+');
        fputcsv($output, ['loc', 'lastmod', 'priority', 'changefreq'], ';');

        foreach ($siteMapObject as $item) {
            fputcsv($output, [
                $item->getLoc(),
                $item->getLastmod(),
                $item->getPriority(),
                $item->getChangefreq(),
            ], ';',
            );
        }

        rewind($output);
        $csvContents = stream_get_contents($output);
        fclose($output);

        return $csvContents;
    }
}
