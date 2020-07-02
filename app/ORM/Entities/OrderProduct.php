<?php

namespace App\ORM\Entities;

class OrderProduct extends AbstractEntity
{
    /** @var int */
    protected $orderId;
    
    /** @var int */
    protected $productId;
    
    /** @var string */
    protected $name;
    
    /** @var string */
    protected $sku;
    
    /** @var string */
    protected $upc;
    
    /** @var string */
    protected $type;
    
    /** @var float */
    protected $price;
    
    /**
     * OrderProduct constructor.
     * @param array|null $data
     */
    public function __construct(array $data = null)
    {
        $this->setData($data);
    }
    
    /**
     * @param array|null $data
     */
    protected function setData(array $data = null)
    {
        if (isset($data['order_id'])) {
            $this->setOrderId($data['order_id']);
        }
        if (isset($data['product_id'])) {
            $this->setProductId($data['product_id']);
        }
        if (isset($data['name'])) {
            $this->setName($data['name']);
        }
        if (isset($data['sku'])) {
            $this->setSku($data['sku']);
        }
        if (isset($data['upc'])) {
            $this->setUpc($data['upc']);
        }
        if (isset($data['type'])) {
            $this->setType($data['type']);
        }
        if (isset($data['base_price'])) {
            $this->setPrice($data['base_price']);
        }
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        
    }
    
    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }
    
    /**
     * @param int|null $orderId
     * @return \App\ORM\Entities\OrderProduct
     */
    public function setOrderId(int $orderId = null): OrderProduct
    {
        $this->orderId = $orderId;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }
    
    /**
     * @param int|null $productId
     * @return \App\ORM\Entities\OrderProduct
     */
    public function setProductId(int $productId = null): OrderProduct
    {
        $this->productId = $productId;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param string|null $name
     * @return \App\ORM\Entities\OrderProduct
     */
    public function setName(string $name = null): OrderProduct
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }
    
    /**
     * @param string|null $sku
     * @return \App\ORM\Entities\OrderProduct
     */
    public function setSku(string $sku = null): OrderProduct
    {
        $this->sku = $sku;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUpc(): string
    {
        return $this->upc;
    }
    
    /**
     * @param string|null $upc
     * @return \App\ORM\Entities\OrderProduct
     */
    public function setUpc(string $upc = null): OrderProduct
    {
        $this->upc = $upc;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    
    /**
     * @param string|null $type
     * @return \App\ORM\Entities\OrderProduct
     */
    public function setType(string $type = null): OrderProduct
    {
        $this->type = $type;
        
        return $this;
    }
    
    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
    
    /**
     * @param float|null $price
     * @return \App\ORM\Entities\OrderProduct
     */
    public function setPrice(float $price = null): OrderProduct
    {
        $this->price = $price;
        
        return $this;
    }
    
}