@extends('layoutMember')
@section('title', 'Product')
@section('User', $ses['name'])
@section('content')

    <h2 class="text text-center py-2">Product</h2>
    @if (@session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @foreach ($products as $item)
        <div class="card">
            <img src="{{ url('images/' . $item->image) }}" class="rounded mx-auto d-block" alt="...">

            <div class="card-body">
                <h5 class="card-title">{{ $item->productname }}</h5><br>
                <p class="card-text">ราคา : {{ $item->price }}บาท </p>
                <p class="card-text">PV : {{ $item->PVPercent }}point</p>
                @if ($item->quantity != 0)
                    <p class = "text text-success">จำนวนสินค้าในคลัง : {{ $item->quantity }} ชิ้น</p>
                    &nbsp;&nbsp;
                    <a href="{{ route('cartAdd', $item->productID) }}" class="btn btn-dark">ใส่รถเข็น</a>
                @else
                    <p class = "text text-danger">สินค้าหมด</p>
                @endif
            </div>
        </div>
        <br>
    @endforeach
@endsection
