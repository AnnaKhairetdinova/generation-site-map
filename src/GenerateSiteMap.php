<?php

declare(strict_types=1);

namespace GenerationSiteMap;

use Exception;
use GenerationSiteMap\Enum\FileFormat;
use GenerationSiteMap\Exception\EmptySiteMapException;
use GenerationSiteMap\Exception\ErrorGenerationException;
use GenerationSiteMap\Exception\InvalidFormatException;
use GenerationSiteMap\Interface\GenerateSiteMapInterface;

class GenerateSiteMap
{
    public function __construct(
        public array  $siteMapArray,
        public string $fileFormat,
        public string $pathToDir,
    ) {
    }

    public function generate(): void
    {
        if (empty($this->siteMapArray)) {
            throw new EmptySiteMapException();
        }

        $siteMapObject = [];

        foreach ($this->siteMapArray as $item) {
            $siteMapObject[] = new SiteMapItem(
                $item['loc'],
                $item['lastmod'],
                $item['priority'],
                $item['changefreq'],
            );
        }

        /** @var GenerateSiteMapInterface $res */
        $res = match ($this->fileFormat) {
            FileFormat::XML->value => new XMLGenerateSiteMap(),
            FileFormat::JSON->value => new JSONGenerateSiteMap(),
            FileFormat::CSV->value => new CSVGenerateSiteMap(),
            default => throw new InvalidFormatException(),
        };
        $content = $res->generate($siteMapObject);

        $directory = dirname($this->pathToDir);
        if (!is_dir($directory)) {
            if (!mkdir($directory, 0777, true)) {
                throw new ErrorGenerationException();
            }
        }
        $file = @file_put_contents($this->pathToDir, $content);
        if ($file === false) {
            throw new ErrorGenerationException();
        }
    }
}
