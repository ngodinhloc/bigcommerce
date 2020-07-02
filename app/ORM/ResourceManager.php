<?php

namespace App\ORM;

use App\ORM\Cache\CacheEngineInterface;
use Bigcommerce\Api\Client;
use Bigcommerce\Api\Resource;

class ResourceManager
{
    /** @var \Bigcommerce\Api\Client */
    protected $client;
    
    /** @var \App\ORM\Cache\CacheEngineInterface */
    protected $cacheEngine;
    
    /** @var bool */
    protected $cache;
    
    /**
     * ResourceManager constructor.
     * @param \Bigcommerce\Api\Client|null $client
     * @param \App\ORM\Cache\CacheEngineInterface|null $cacheEngine
     * @param bool $cache
     */
    public function __construct(Client $client = null, CacheEngineInterface $cacheEngine = null, bool $cache = true)
    {
        $this->client      = $client;
        $this->cacheEngine = $cacheEngine;
        $this->cache       = $cache;
    }
    
    /**
     * @param int $limit
     * @return array
     */
    public function getCustomers(int $limit)
    {
        if ($this->cache) {
            $key   = $this->cacheEngine->createKey("Customers.Limit.$limit");
            $cache = $this->cacheEngine->getCache($key);
            if ($cache !== null) {
                return $cache;
            }
        }
        
        $resources = $this->client->getCustomers(['limit' => $limit]);
        $array     = $this->resourcesToArray($resources);
        if ($this->cache) {
            $key = $this->cacheEngine->createKey("Customers.Limit.$limit");
            $this->cacheEngine->writeCache($key, $array);
        }
        
        return $array;
    }
    
    /**
     * @param int $id
     * @return array
     */
    public function getCustomer(int $id)
    {
        if ($this->cache) {
            $key   = $this->cacheEngine->createKey("Customer.$id");
            $cache = $this->cacheEngine->getCache($key);
            if ($cache !== null) {
                return $cache;
            }
        }
        
        $resource = $this->client->getCustomer($id);
        $array    = $this->resourceToArray($resource);
        if ($this->cache) {
            $key = $this->cacheEngine->createKey("Customer.$id");
            $this->cacheEngine->writeCache($key, $array);
        }
        
        return $array;
    }
    
    /**
     * @param int $orderId
     * @return array
     */
    public function getOrderProducts(int $orderId)
    {
        if ($this->cache) {
            $key   = $this->cacheEngine->createKey("OrderProducts.OrderId.$orderId");
            $cache = $this->cacheEngine->getCache($key);
            if ($cache !== null) {
                return $cache;
            }
        }
        
        $resources = $this->client->getOrderProducts($orderId);
        $array     = $this->resourcesToArray($resources);
        if ($this->cache) {
            $key = $this->cacheEngine->createKey("OrderProducts.OrderId.$orderId");
            $this->cacheEngine->writeCache($key, $array);
        }
        
        return $array;
    }
    
    /**
     * @param int $customerId
     * @return array
     */
    public function getOrders(int $customerId)
    {
        if ($this->cache) {
            $key   = $this->cacheEngine->createKey("Orders.CustomerId.$customerId");
            $cache = $this->cacheEngine->getCache($key);
            if ($cache !== null) {
                return $cache;
            }
        }
        
        $resources = $this->client->getOrders(['customer_id' => $customerId]);
        $array     = $this->resourcesToArray($resources);
        if ($this->cache) {
            $key = $this->cacheEngine->createKey("Orders.CustomerId.$customerId");
            $this->cacheEngine->writeCache($key, $array);
        }
        
        return $array;
    }
    
    /**
     * @return \Bigcommerce\Api\Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
    
    /**
     * @param \Bigcommerce\Api\Client $client
     * @return \App\ORM\ResourceManager
     */
    public function setClient(Client $client): ResourceManager
    {
        $this->client = $client;
        
        return $this;
    }
    
    /**
     * @return \App\ORM\Cache\CacheEngineInterface
     */
    public function getCacheEngine(): CacheEngineInterface
    {
        return $this->cacheEngine;
    }
    
    /**
     * @param \App\ORM\Cache\CacheEngineInterface $cacheEngine
     * @return \App\ORM\ResourceManager
     */
    public function setCacheEngine(CacheEngineInterface $cacheEngine): ResourceManager
    {
        $this->cacheEngine = $cacheEngine;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isCache(): bool
    {
        return $this->cache;
    }
    
    /**
     * @param bool $cache
     * @return \App\ORM\ResourceManager
     */
    public function setCache(bool $cache): ResourceManager
    {
        $this->cache = $cache;
        
        return $this;
    }
    
    /**
     * @param array $resources
     * @return array|null|bool
     */
    protected function resourcesToArray($resources)
    {
        if (empty($resources)) {
            return [];
        }
        $array = [];
        foreach ($resources as $resource) {
            $array[] = $this->resourceToArray($resource);
        }
        
        return $array;
    }
    
    /**
     * @param \Bigcommerce\Api\Resource $resource
     * @return array|null|bool
     */
    protected function resourceToArray(Resource $resource)
    {
        if (empty($resource)) {
            return [];
        }
        $array = array_merge(['id' => $resource->id], (array)$resource->getCreateFields());
        
        return $array;
    }
    
}