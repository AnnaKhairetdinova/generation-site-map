<?php

declare(strict_types=1);

namespace GenerationSiteMap\Exception;

class EmptySiteMapException extends \Exception
{
    protected $message = 'Пустой site map.';
}
