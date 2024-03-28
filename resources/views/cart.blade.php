@extends('layoutMember')
@section('title', 'Cart')
@if(isset($ses['name']))
    @section('User', $ses['name'])
@endif
@section('content')
    <h2 class="my-5 text-center">Cart</h2>
    @if (session('cart'))
        <div class="container">
            <div class="row">
                @foreach (session('cart') as $productID => $details)
                    <div class="col-md-6 mx-auto mb-4">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ url('images/' . $details['image']) }}" class="card-img"
                                        alt="Product Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $details['name'] }}</h5>
                                        <p class="card-text">รหัสสินค้า: {{ $details['productID'] }}</p>
                                        <p class="card-text">จำนวน: {{ $details['quantity'] }} ชิ้น</p>
                                        <p class="card-text">ราคารวม: {{ $details['price'] * $details['quantity'] }}
                                            บาท</p>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('deleteCart', $details['productID']) }}"
                                                class="btn btn-danger" role="button"
                                                onclick="return confirm('ต้องการลดจำนวนสินค้า{{ $details['name'] }}หรือไม่ ?')">ลบที่ละชิ้น
                                            </a>
                                            <a href="{{ route('deletePd', $details['productID']) }}"
                                                class="btn btn-danger" role="button"
                                                onclick="return confirm('ต้องการลบสินค้า{{ $details['name'] }}ออกจากตะกร้าหรือไม่ ?')">ลบสินค้าจากตะกร้า
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container text-center">
            <h4 class="form-label">จำนวนสินค้าทั้งหมด {{ $sumQty }} ชิ้น</h4>
            <h4 class="form-label">ราคารวม {{ $sumP }} บาท</h4>
            <a href="/clearCart/{productID}" class="btn btn-danger my-3" style="background-color: red"
                onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบสินค้าทั้งหมดในตะกร้า?')">ยกเลิกสินค้า
            </a>
            <a href="/order" class="btn btn-primary my-3" style="background-color: blue">สั่งซื้อสินค้า</a>
        </div>
    @else
        <h4 class="my-5 text-center">Empty Cart</h4>
    @endif
@endsection
