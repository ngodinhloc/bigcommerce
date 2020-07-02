<?php

namespace App\ORM\Entities;

class AbstractEntity
{
    /** @var int */
    protected $id;
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     * @return \App\ORM\Entities\AbstractEntity
     */
    public function setId(int $id): AbstractEntity
    {
        $this->id = $id;
        
        return $this;
    }
    
}