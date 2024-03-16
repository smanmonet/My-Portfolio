@extends('layout')
@section('title', 'Cart')
@section('content')
    <h2 class="text text-center py-2">Cart</h2>
    <div>
        <a href="/product" class="btn btn-dark">product</a>
        <p class="card-text">
            @foreach ($list as $productID => $quantity)
                ProductID: {{ $productID }}<br>
                Quantity: {{ $quantity }} ชิ้น<br>
            @endforeach
        </p>
    </div>
@endsection
