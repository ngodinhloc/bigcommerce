<?php

namespace App\Services;

use App\ORM\Repositories\CustomerRepository;
use App\ORM\Repositories\OrderRepository;
use App\ORM\Repositories\OrderProductRepository;

class CustomerService
{
    /** @var \App\ORM\Repositories\CustomerRepository */
    protected $customerRepository;
    
    /** @var \App\ORM\Repositories\OrderRepository */
    protected $orderRepository;
    
    /** @var \App\ORM\Repositories\OrderProductRepository */
    protected $orderProductRepository;
    
    /**
     * CustomerService constructor.
     * @param \App\ORM\Repositories\CustomerRepository $customerRepository
     * @param \App\ORM\Repositories\OrderRepository $orderRepository
     * @param \App\ORM\Repositories\OrderProductRepository $productRepository
     */
    public function __construct(
        CustomerRepository $customerRepository,
        OrderRepository $orderRepository,
        OrderProductRepository $productRepository)
    {
        $this->customerRepository     = $customerRepository;
        $this->orderRepository        = $orderRepository;
        $this->orderProductRepository = $productRepository;
    }
    
    /**
     * @param array $options ['loadOrders' => true|false, 'loadOrderProducts' => true|false]
     * @return \App\ORM\Entities\Customer[]
     */
    public function getCustomers(array $options = [])
    {
        $customers = $this->customerRepository->getCustomers();
        if (isset($options['loadOrders']) && $options['loadOrders'] === true) {
            foreach ($customers as $customer) {
                $orders = $this->orderRepository->getOrders($customer);
                if (isset($options['loadOrderProducts']) && $options['loadOrderProducts'] === true) {
                    foreach ($orders as $order) {
                        $this->orderProductRepository->getOrderProducts($order);
                    }
                }
                $customer->setOrders($orders);
            }
        }
        
        return $customers;
    }
    
    /**
     * @param int $customerId
     * @param array $options ['loadOrders' => true|false, 'loadOrderProducts' => true|false]
     * @return \App\ORM\Entities\Customer
     */
    public function getCustomer(int $customerId, array $options = [])
    {
        $customer = $this->customerRepository->getCustomer($customerId);
        if (isset($options['loadOrders']) && $options['loadOrders'] === true) {
            $orders = $this->orderRepository->getOrders($customer);
            if (isset($options['loadOrderProducts']) && $options['loadOrderProducts'] === true) {
                foreach ($orders as $order) {
                    $this->orderProductRepository->getOrderProducts($order);
                }
            }
            $customer->setOrders($orders);
        }
        
        return $customer;
    }
    
    /**
     * @return \App\ORM\Repositories\CustomerRepository
     */
    public function getCustomerRepository(): CustomerRepository
    {
        return $this->customerRepository;
    }
    
    /**
     * @param \App\ORM\Repositories\CustomerRepository $customerRepository
     * @return \App\Services\CustomerService
     */
    public function setCustomerRepository(CustomerRepository $customerRepository): CustomerService
    {
        $this->customerRepository = $customerRepository;
        
        return $this;
    }
    
    /**
     * @return \App\ORM\Repositories\OrderRepository
     */
    public function getOrderRepository(): OrderRepository
    {
        return $this->orderRepository;
    }
    
    /**
     * @param \App\ORM\Repositories\OrderRepository $orderRepository
     * @return \App\Services\CustomerService
     */
    public function setOrderRepository(OrderRepository $orderRepository): CustomerService
    {
        $this->orderRepository = $orderRepository;
        
        return $this;
    }
    
    /**
     * @return \App\ORM\Repositories\OrderProductRepository
     */
    public function getOrderProductRepository(): OrderProductRepository
    {
        return $this->orderProductRepository;
    }
    
    /**
     * @param \App\ORM\Repositories\OrderProductRepository $orderProductRepository
     * @return \App\Services\CustomerService
     */
    public function setOrderProductRepository(OrderProductRepository $orderProductRepository): CustomerService
    {
        $this->orderProductRepository = $orderProductRepository;
        
        return $this;
    }
    
}