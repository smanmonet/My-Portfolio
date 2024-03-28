@extends('layoutMember')
@section('title', 'Home')
@section('User', $ses['name'])
@section('content')
<h2>
    <center>Home page</center>
</h2>

<section class="py-5">
    <h4>
        <center>ซื้อเลย โปรโมชันในช่วงนี้ !!!</center>
    </h4>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
            <!-- First Promotion -->

            @foreach ($promo as $pro)
                @if (now()->toDateString() <= $pro->endDate)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <div>{{ $pro->promotionname }}</div>
                                    <!-- Product price-->
                                    {{ $pro->price_pro }} บาท
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection
