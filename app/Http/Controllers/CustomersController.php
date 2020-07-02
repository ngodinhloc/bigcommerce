<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Bigcommerce\Api\Client;
use Illuminate\Routing\Controller as BaseController;

class CustomersController extends BaseController
{
    public function index(CustomerService $customerService)
    {
        $customers = $customerService->getCustomers(['loadOrders' => true, 'loadOrderProducts' => false]);

        return view('customers', ['customers' => $customers]);
    }
}
