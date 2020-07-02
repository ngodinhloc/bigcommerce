<?php

namespace App\ORM\Entities;

class Order extends AbstractEntity
{
    /** @var int */
    protected $customerId;
    
    /** @var string */
    protected $status;
    
    /** @var float */
    protected $subTotal;
    
    /** @var string */
    protected $currency;
    
    /** @var string */
    protected $date;
    
    /** @var \App\ORM\Entities\OrderProduct[] */
    protected $orderProducts = [];
    
    /**
     * Order constructor.
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
        if (isset($data['customer_id'])) {
            $this->setCustomerId($data['customer_id']);
        }
        if (isset($data['status'])) {
            $this->setStatus($data['status']);
        }
        if (isset($data['subtotal_inc_tax'])) {
            $this->setSubTotal($data['subtotal_inc_tax']);
        }
        if (isset($data['currency_code'])) {
            $this->setCurrency($data['currency_code']);
        }
        if (isset($data['date_created'])) {
            $this->setDate($data['date_created']);
        }
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
    }
    
    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }
    
    /**
     * @param int|null $customerId
     * @return \App\ORM\Entities\Order
     */
    public function setCustomerId(int $customerId = null): Order
    {
        $this->customerId = $customerId;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
    
    /**
     * @param string|null $status
     * @return \App\ORM\Entities\Order
     */
    public function setStatus(string $status = null): Order
    {
        $this->status = $status;
        
        return $this;
    }
    
    /**
     * @return float
     */
    public function getSubTotal(): float
    {
        return $this->subTotal;
    }
    
    /**
     * @param float|null $subTotal
     * @return \App\ORM\Entities\Order
     */
    public function setSubTotal(float $subTotal = null): Order
    {
        $this->subTotal = $subTotal;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
    
    /**
     * @param string|null $currency
     * @return \App\ORM\Entities\Order
     */
    public function setCurrency(string $currency = null): Order
    {
        $this->currency = $currency;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }
    
    /**
     * @param string|null $date
     * @return \App\ORM\Entities\Order
     */
    public function setDate(string $date = null): Order
    {
        $this->date = $date;
        
        return $this;
    }
    
    /**
     * @return \App\ORM\Entities\OrderProduct[]
     */
    public function getOrderProducts(): array
    {
        return $this->orderProducts;
    }
    
    /**
     * @param \App\ORM\Entities\OrderProduct[] $orderProducts
     * @return \App\ORM\Entities\Order
     */
    public function setOrderProducts(array $orderProducts = []): Order
    {
        $this->orderProducts = $orderProducts;
        
        return $this;
    }
    
}