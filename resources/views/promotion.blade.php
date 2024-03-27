@extends('layoutMember')
@section('title', 'Promotion')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Promotion</title>

</head>

<body>
    
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
                <!-- First Promotion -->

                @foreach ($promotion as $pro)
                @if(now()->toDateString() <= $pro->endDate)
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
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto"
                                    href="{{ route('receipt',$pro->proID) }}">buy</a>
                                </div>
                        </div>
                    </div>
                </div>
                    
                @else

                @endif

                @endforeach
                
                <!-- Promotion -->
            </div>
        </div>
    </section>
    <!-- Section-->
</body>

</html>
@endsection
