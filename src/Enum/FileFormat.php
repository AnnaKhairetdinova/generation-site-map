<?php

declare(strict_types=1);

namespace GenerationSiteMap\Enum;

enum FileFormat: string
{
    case XML = 'xml';
    case CSV = 'csv';
    case JSON = 'json';
}
