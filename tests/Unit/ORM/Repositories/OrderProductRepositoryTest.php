<?php

namespace Tests\Unit\ORM\Repositories;

use App\ORM\Entities\Order;
use App\ORM\Repositories\OrderProductRepository;
use App\ORM\ResourceManager;
use Tests\TestCase;

class OrderProductRepositoryTest extends TestCase
{
    /** @var \App\ORM\Repositories\OrderProductRepository */
    protected $orderProductRepository;
    
    /** @var \App\ORM\ResourceManager|\PHPUnit\Framework\MockObject\MockObject */
    protected $resourceManager;
    
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->resourceManager        = $this->createMock(ResourceManager::class);
        $this->orderProductRepository = new OrderProductRepository($this->resourceManager);
    }
    
    /**
     * @covers \App\ORM\Repositories\OrderProductRepository::setResourceManager
     * @covers \App\ORM\Repositories\OrderProductRepository::getResourceManager
     */
    public function testSettersAndGetters()
    {
        $this->orderProductRepository->setResourceManager($this->resourceManager);
        $this->assertEquals($this->resourceManager, $this->orderProductRepository->getResourceManager());
    }
    
    /**
     * @covers \App\ORM\Repositories\OrderProductRepository::getOrderProducts
     */
    public function testGetOrderProducts()
    {
        $order      = new Order(['id' => 1]);
        $mockResult = [
            ['id' => 1],
            ['id' => 2],
        ];
        $this->resourceManager->method('getOrderProducts')->willReturn($mockResult);
        $this->resourceManager->expects($this->exactly(1))->method('getOrderProducts')->with($order->getId());
        $products = $this->orderProductRepository->getOrderProducts($order);
        $this->assertEquals($mockResult[0]['id'], $products[0]->getId());
        $this->assertEquals($mockResult[1]['id'], $products[1]->getId());
    }
}