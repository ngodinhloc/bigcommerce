@extends('layouts.app')

@section('title', $customer->getFirstName() . "'s Order History")

@section('content')
    <table style="border: black 1px solid">
        <thead>
        <tr>
            <th>OrderId</th>
            <th>Date</th>
            <th># of Products</th>
            <th>Products</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customer->getOrders() as $order)
            <tr>
                <td>{{ $order->getId() }}</td>
                <td>{{ $order->getDate() }}</td>
                <td>{{ count($order->getOrderProducts()) }}</td>
                <td>
                    @foreach($order->getOrderProducts() as $product)
                        <span>{{ $product->getName() }}</span><br/>
                    @endforeach
                </td>
                <td>${{ $order->getSubTotal() }}</td>
            <tr>
        @endforeach
        <tr>
            <td colspan="4">Lifetime Value</td>
            <td><strong>${{ $customer->getLifeTimeValue() }}</strong></td>
        </tr>
        </tbody>
    </table>
@endsection
