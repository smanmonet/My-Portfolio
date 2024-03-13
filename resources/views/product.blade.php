@extends('layout')
@section('title', 'Product')
@section('content')
    <h2 class="text text-center py-2">Product</h2>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @foreach ($products as $item)
        <div class="card">
            <img src="..." class="card-img-top" alt="...">

            <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5><br>
                <p class="card-text">ราคา : {{ $item->price }}บาท </p>
                <p class="card-text">PV : {{ $item->PVPercent }}point</p>
                @if ($item->quantity !=0)
                    <p class = "text text-success">จำนวนสินค้าในคลัง : {{ $item->quantity }} ชิ้น</p>
                    จำนวน : <input type="number" name="quantity" min="1" max= {{$item->quantity}} class="btn btn-secondary">
                    &nbsp;&nbsp;
                    <a href="#" class="btn btn-dark">ใส่รถเข็น</a>
                @else
                    <p class = "text text-danger">สินค้าหมด</p>
                @endif
                
            </div>
        </div>
    @endforeach
@endsection
