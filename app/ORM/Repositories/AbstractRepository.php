<?php

namespace App\ORM\Repositories;

use App\ORM\ResourceManager;

abstract class AbstractRepository
{
    /** @var \App\ORM\ResourceManager */
    protected $resourceManager;
    
    /**
     * AbstractRepository constructor.
     * @param \App\ORM\ResourceManager|null $resourceManager
     */
    public function __construct(ResourceManager $resourceManager = null)
    {
        $this->resourceManager = $resourceManager;
    }
    
    /**
     * @return \App\ORM\ResourceManager
     */
    public function getResourceManager(): ResourceManager
    {
        return $this->resourceManager;
    }
    
    /**
     * @param \App\ORM\ResourceManager $resourceManager
     * @return \App\ORM\Repositories\AbstractRepository
     */
    public function setResourceManager(ResourceManager $resourceManager): AbstractRepository
    {
        $this->resourceManager = $resourceManager;
        
        return $this;
    }
    
}