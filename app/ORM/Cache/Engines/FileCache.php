<?php

namespace App\ORM\Cache\Engines;

use App\ORM\Cache\AbstractCacheEngine;
use App\ORM\Cache\CacheEngineInterface;
use App\ORM\Cache\Exceptions\FileCacheException;

class FileCache extends AbstractCacheEngine implements CacheEngineInterface
{
    /**
     * Write to cache file
     *
     * @param string $key
     * @param mixed $data
     * @return bool
     * @throws \App\ORM\Cache\Exceptions\FileCacheException
     */
    public function writeCache(string $key = null, $data = null)
    {
        $file  = $this->cacheDir . $this->createKey($key);
        $array = ['time' => time(), 'data' => $data];
        $json  = json_encode($array);
        if ($json) {
            try {
                $result = file_put_contents($file, $json);
                if ($result) {
                    return true;
                }
            }
            catch (\Exception $exception) {
                throw new FileCacheException(
                    FileCacheException::ERROR_FAILED_TO_PUT_CONTENT . $exception->getMessage()
                );
            }
        }
        
        return false;
    }
    
    /**
     * Get cache in original data format
     *
     * @param string $key
     * @return mixed|null
     * @throws \App\ORM\Cache\Exceptions\FileCacheException
     */
    public function getCache(string $key = null)
    {
        $file = $this->cacheDir . $this->createKey($key);
        if (file_exists($file)) {
            try {
                $content = file_get_contents($file);
                if ($content) {
                    $arr  = json_decode($content, true);
                    $time = $arr['time'];
                    $data = $arr['data'];
                    if ($this->cacheTime >= time() - $time) {
                        return $data;
                    }
                }
            }
            catch (\Exception $exception) {
                throw new FileCacheException(
                    FileCacheException::ERROR_FAILED_TO_GET_CONTENT . $exception->getMessage()
                );
            }
        }
        
        return null;
    }
    
    /**
     * Create cache key
     *
     * @param string $key
     * @return string
     */
    public function createKey(string $key = null)
    {
        return md5($key);
    }
}