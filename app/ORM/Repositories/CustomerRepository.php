<?php

namespace App\ORM\Repositories;

use App\ORM\Entities\Customer;

class CustomerRepository extends AbstractRepository
{
    /**
     * @param int $limit
     * @return \App\ORM\Entities\Customer[]
     */
    public function getCustomers(int $limit = 20)
    {
        $array = $this->resourceManager->getCustomers($limit);
        $customers = [];
        foreach ($array as $data) {
            $customers[] = new Customer($data);
        }

        return $customers;
    }
    
    /**
     * @param int $customerId
     * @return \App\ORM\Entities\Customer
     */
    public function getCustomer(int $customerId)
    {
        $data = $this->resourceManager->getCustomer($customerId);
        $customer = new Customer($data);
        
        return $customer;
    }
}