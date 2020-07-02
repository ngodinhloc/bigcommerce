<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Illuminate\Routing\Controller as BaseController;

class CustomerDetailsController extends BaseController
{
    public function show($id, CustomerService $customerService)
    {
        $customer = $customerService->getCustomer($id, ['loadOrders' => true, 'loadOrderProducts' => true]);
        
        return view('details', ['customer' => $customer]);
    }
}
