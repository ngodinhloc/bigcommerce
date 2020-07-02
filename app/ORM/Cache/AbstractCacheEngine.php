<?php

namespace App\ORM\Cache;

use App\ORM\Cache\Exceptions\CacheException;

abstract class AbstractCacheEngine
{
    /** @var null|string */
    protected $cacheDir;
    
    /** @var int seconds */
    protected $cacheTime;
    
    /**
     * CacheEngine constructor.
     *
     * @param string|null $cacheDir
     * @param int $cacheTime
     * @throws \App\ORM\Cache\Exceptions\CacheException
     */
    public function __construct(string $cacheDir = null, int $cacheTime = 36000)
    {
        if (!is_dir($cacheDir)) {
            throw new CacheException(CacheException::MSG_INVALID_CACHE_DIR . $cacheDir);
        }
        $this->cacheDir  = $cacheDir;
        $this->cacheTime = $cacheTime;
    }
    
    /**
     * @return null|string
     */
    public function getCacheDir(): ?string
    {
        return $this->cacheDir;
    }
    
    /**
     * @param null|string $cacheDir
     * @return \App\ORM\Cache\AbstractCacheEngine
     */
    public function setCacheDir(?string $cacheDir): AbstractCacheEngine
    {
        $this->cacheDir = $cacheDir;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCacheTime(): int
    {
        return $this->cacheTime;
    }
    
    /**
     * @param int $cacheTime
     * @return \App\ORM\Cache\AbstractCacheEngine
     */
    public function setCacheTime(int $cacheTime): AbstractCacheEngine
    {
        $this->cacheTime = $cacheTime;
        
        return $this;
    }
    
}