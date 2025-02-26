<?php

declare(strict_types=1);

namespace GenerationSiteMap;

use GenerationSiteMap\Interface\GenerateSiteMapInterface;
use SimpleXMLElement;

class XMLGenerateSiteMap implements GenerateSiteMapInterface
{
    public function generate(array $siteMapObject): string|bool
    {
        $newXML = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset></urlset>');
        $newXML->addAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $newXML->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $newXML->addAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

        foreach ($siteMapObject as $item) {
            $url = $newXML->addChild('url');
            $url->addChild('loc', $item->getLoc());
            $url->addChild('lastmod', $item->getLastMod());
            $url->addChild('priority', (string) $item->getPriority());
            $url->addChild('changefreq', $item->getChangefreq());
        }

        return $newXML->asXML();
    }
}
