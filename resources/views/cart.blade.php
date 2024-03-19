@extends('layout')
@section('title', 'Cart')
@section('content')
    <tbody>
        @if(session('cart'))
            @foreach(session('cart') as $productID => $details)
            <div class="card">
                <img src="..." class="rounded mx-auto d-block" alt="...">
    
                <div class="card-body">
                    <h5 class="card-title">{{ $details['name']}}</h5><br>
                    <p class="card-text">รหัส : {{$details['productID']}} </p>
                    <p class="card-text">ราคา : {{$details['price']}}บาท </p>
                    <p class="card-text">PV : {{$details['PV']}}point</p>
                    <p class="card-text">จำนวน : {{$details['quantity']}}ชิ้น </p>
                    <a 
                    href="{{route('deletecart',$details['productID'])}}" 
                    class="btn btn-danger"
                    onclick="return confirm('ต้องการลบสินค้า{{ $details['name']}}หรือไม่ ?')"
                    >ลบ 
                </a>
                </div>
            </div>
            @endforeach
        @endif
    </tbody>
    
<input type="submit" value="สั่งซื้อสินค้า" class="btn btn-dark my-3">
@endsection
