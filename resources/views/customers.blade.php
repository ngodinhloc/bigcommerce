@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th># of Orders</th>
                <th></th>
            </tr>
        </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->getId() }}</td>
                        <td>{{ $customer->getFirstName() }}</td>
                        <td>{{ $customer->getLastName() }}</td>
                        <td>{{ $customer->getEmail() }}</td>
                        <td><strong>{{ count($customer->getOrders()) }}</strong></td>
                        <td><a href='{{ route('CustomerDetails.show', $customer->getId()) }}'>View Orders</a></td>
                    <tr>
                @endforeach
            </tbody>
    </table>
@endsection
