@extends('layoutMember')
@section('title', 'Cart')
@section('content')
    <tbody>
        <h2 class="text text-center py-2">Cart</h2>
        @if (session('cart'))
            @foreach (session('cart') as $productID => $details)
                <div class="card">
                    <img src="..." class="rounded mx-auto d-block" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $details['name'] }}</h5><br>
                        <p class="card-text">รหัสสินค้า : {{ $details['productID'] }} </p>
                        <p class="card-text">จำนวน : {{ $details['quantity'] }}ชิ้น </p>
                        <p class="card-text">ราคารวม : {{ $details['price'] * $details['quantity'] }} บาท </p>
                        <div style="display: none"> {{ $sumQty += $details['quantity'] }}</div>
                        <div style="display: none"> {{ $sumP += $details['price'] * $details['quantity'] }}</div>
                        <a href="{{ route('deletecart', $details['productID']) }}" class="btn btn-danger"
                            onclick="return confirm('ต้องการลดจำนวนสินค้า{{ $details['name'] }}หรือไม่ ?')">ลบทีละชิ้น
                        </a>
                        <a href="{{ route('deletepd', $details['productID']) }}" class="btn btn-danger"
                            onclick="return confirm('ต้องการลบสินค้า{{ $details['name'] }}ออกจากตะกร้าหรือไม่ ?')">ลบสินค้า
                        </a>
                    </div>
                </div>
            @endforeach
            <br>
            <h4>จำนวนสินค้าทั้งหมด {{ $sumQty }}ชิ้น
                <br>ราคารวม {{ $sumP }} บาท
            </h4><br>
            <input type="submit" value="สั่งซื้อสินค้า" class="btn btn-dark my-3">
        @else
            <h4 class="my-5">
                <center>Empty Cart</center>
            </h4>
        @endif
    </tbody>
@endsection
