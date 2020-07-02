<?php

namespace App\ORM\Repositories;

use App\ORM\Entities\Order;
use App\ORM\Entities\OrderProduct;

class OrderProductRepository extends AbstractRepository
{
    /**
     * @param \App\ORM\Entities\Order $order
     * @return \App\ORM\Entities\OrderProduct[]
     */
    public function getOrderProducts(Order $order)
    {
        $resources     = $this->resourceManager->getOrderProducts($order->getId());
        $orderProducts = [];
        
        if (empty($resources)) {
            $order->setOrderProducts($orderProducts);
            
            return $orderProducts;
        }
        
        foreach ($resources as $resource) {
            $orderProducts[] = new OrderProduct($resource);
        }
        $order->setOrderProducts($orderProducts);
        
        return $orderProducts;
    }
}