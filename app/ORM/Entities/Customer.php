<?php

namespace App\ORM\Entities;

class Customer extends AbstractEntity
{
    /** @var string */
    protected $company;
    
    /** @var string */
    protected $firstName;
    
    /** @var string */
    protected $lastName;
    
    /** @var string */
    protected $email;
    
    /** @var string */
    protected $phone;
    
    /** @var \App\ORM\Entities\Order[] */
    protected $orders = [];
    
    /**
     * Customer constructor.
     * @param array|null $data
     */
    public function __construct(array $data = null)
    {
        $this->setData($data);
    }
    
    /**
     * @param array|null $data
     */
    public function setData(array $data = null)
    {
        if (isset($data['company'])) {
            $this->setCompany($data['company']);
        }
        if (isset($data['first_name'])) {
            $this->setFirstName($data['first_name']);
        }
        if (isset($data['last_name'])) {
            $this->setLastName($data['last_name']);
        }
        if (isset($data['email'])) {
            $this->setEmail($data['email']);
        }
        if (isset($data['phone'])) {
            $this->setPhone($data['phone']);
        }
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
    }
    
    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }
    
    /**
     * @param string|null $company
     * @return \App\ORM\Entities\Customer
     */
    public function setCompany(string $company = null): Customer
    {
        $this->company = $company;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    /**
     * @param string|null $firstName
     * @return \App\ORM\Entities\Customer
     */
    public function setFirstName(string $firstName = null): Customer
    {
        $this->firstName = $firstName;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
    
    /**
     * @param string|null $lastName
     * @return \App\ORM\Entities\Customer
     */
    public function setLastName(string $lastName = null): Customer
    {
        $this->lastName = $lastName;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    
    /**
     * @param string|null $email
     * @return \App\ORM\Entities\Customer
     */
    public function setEmail(string $email = null): Customer
    {
        $this->email = $email;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
    
    /**
     * @param string $phone
     * @return \App\ORM\Entities\Customer
     */
    public function setPhone(string $phone = null): Customer
    {
        $this->phone = $phone;
        
        return $this;
    }
    
    /**
     * @return \App\ORM\Entities\Order[]
     */
    public function getOrders(): array
    {
        return $this->orders;
    }
    
    /**
     * @param \App\ORM\Entities\Order[] $orders
     * @return \App\ORM\Entities\Customer
     */
    public function setOrders(array $orders = []): Customer
    {
        $this->orders = $orders;
        
        return $this;
    }
    
    /**
     * @return float|int
     */
    public function getLifeTimeValue()
    {
        $total = 0;
        foreach ($this->orders as $order) {
            $total += $order->getSubTotal();
        }
        
        return $total;
    }
}