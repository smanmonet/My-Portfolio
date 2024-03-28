@extends('layoutMember')
@section('title', 'Cart')
@if(isset($ses['name']))
    @section('User', $ses['name'])
@endif
@section('content')
    <tbody>
        <h2 class="my-5">
            <center>Cart</center>
        </h2>
        @if (session('cart'))
            @foreach (session('cart') as $productID => $details)
                <div class="d-flex justify-content-center">
                    <div class=" justify-content-center align-items-end" style="padding-top:10px">

                        <div class="col m-0 " style="width:1000px;">
                            <div class="d-flex card h-50" style="border-radius:20px;">

                                <img src="{{ url('images/' . $details['image']) }}" class="rounded mx-auto d-block"
                                    alt="...">
                                <div class="d-flex flex-row justify-content-around card-body p-4">

                                    <h4 class="card-title">{{ $details['name'] }}</h4>
                                    <br>
                                    <p class="card-text">รหัสสินค้า : {{ $details['productID'] }} </p>
                                    <p class="card-text">จำนวน : {{ $details['quantity'] }} ชิ้น </p>
                                    <p class="card-text">ราคารวม : {{ $details['price'] * $details['quantity'] }} บาท </p>
                                    <div style="display: none"> {{ $sumQty}}</div>
                                    <div style="display: none"> {{ $sumP }}
                                </div>
                                    <a href="{{ route('deleteCart', $details['productID']) }}" class="btn btn-danger"
                                        style="width: 10%"
                                        onclick="return confirm('ต้องการลดจำนวนสินค้า{{ $details['name'] }}หรือไม่ ?')">ลบที่ละชิ้น
                                    </a>
                                    <a href="{{ route('deletePd', $details['productID']) }}" class="btn btn-danger"
                                        style="width: 18%"
                                        onclick="return confirm('ต้องการลบสินค้า{{ $details['name'] }}ออกจากตะกร้าหรือไม่ ?')">ลบสินค้าจากตะกร้า
                                    </a>
                                </div>
                            </div>
            @endforeach
            <br>
            <center>
                <h4 class="form-label">
                    จำนวนสินค้าทั้งหมด {{ $sumQty }} ชิ้น<br>
                </h4>
                <h4 class="form-label">
                    <br>ราคารวม {{ $sumP }} บาท<br>
                </h4>


                <a href="/clearCart/{productID}" style= "background-color: red" class="btn btn-dark my-3"
                    value="ยกเลิกสินค้า">ยกเลิกสินค้า</a>
                <a href="/order" style="background-color: blue" class="btn btn-dark my-3"
                    value="สั่งซื้อสินค้า">สั่งซื้อสินค้า</a>
            </center>
        @else
            <h4 class="my-5">
                <center>Empty Cart</center>
            </h4>
        @endif

    </tbody>
@endsection
