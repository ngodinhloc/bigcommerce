<?php

namespace App\ORM\Cache\Exceptions;

class CacheException extends \Exception
{
    const MSG_MISSING_CACHE_CONFIGURATION = 'Missing cache configurations: ';
    const MSG_INVALID_CACHE_DIR           = 'Invalid cache dir: ';
}