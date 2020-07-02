<?php

namespace App\ORM\Repositories;

use App\ORM\Entities\Customer;
use App\ORM\Entities\Order;

class OrderRepository extends AbstractRepository
{
    /**
     * @param \App\ORM\Entities\Customer $customer
     * @return \App\ORM\Entities\Order[]
     */
    public function getOrders(Customer $customer)
    {
        $array  = $this->resourceManager->getOrders($customer->getId());
        $orders = [];
        foreach ($array as $data) {
            $orders[] = new Order($data);
        }
        $customer->setOrders($orders);
        
        return $orders;
    }
}