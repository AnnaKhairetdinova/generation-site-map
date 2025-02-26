<?php

declare(strict_types=1);

namespace GenerationSiteMap\Exception;

class ErrorGenerationException extends \Exception
{
    protected $message = 'Ошибка при генерации.';
}
