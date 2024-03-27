<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Promotion</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Styles -->

</head>

<body>
    
    <!-- HEADER -->
    <div class="d-flex flex-row justify-content-end" style="background-color:#25393C;height:70px;">
        <div class="d-flex flex-row justify-content-end align-items-center" style="padding-right: 0px;color:#EAEAEA">
            <i class="bi bi-person-circle" style="font-size: 2rem;color: #EAEAEA;padding-right:10px"></i>
        </div>
        <div class="d-flex flex-row justify-content-start align-items-center"
            style="width:150px; padding-right: 0px;color:#EAEAEA">
            {{$member->Name}}
        </div>
    </div>
    <!-- HEADER -->
    <!-- Nav -->
    <nav class="flex-row" style="background-color: #AAB8C1;height:65px;">
        <ul class="nav nav-underline justify-content-around" style="padding-top:10px">
            <li class="nav-item">
                <div class="d-flex flex-row">
                    <i class="bi bi-house" style="font-size: 2rem; padding-right: 15px;"></i>
                    <a href="/welcome" class="nav-link"
                        style=" color: #44576D; font-size: 20px; font-family: Inter; font-weight: 700; "
                        aria-current="page">Home</a>
                </div>
            </li>
            <li class="nav-item">
                <div class="d-flex flex-row">
                    <i class="bi bi-star-half" style="font-size: 2rem; padding-right: 15px;"></i>
                    <a href="promotions" class="nav-link active"
                        style=" color: #44576D; font-size: 20px; font-family: Inter; font-weight: 700; "
                        aria-current="page">Promotion</a>
                </div>
            </li>
            <li class="nav-item">
                <div class="d-flex flex-row">
                    <i class="bi bi-bag" style="font-size: 2rem; padding-right: 15px;"></i>
                    <a href="#" class="nav-link"
                        style=" color: #44576D; font-size: 20px; font-family: Inter; font-weight: 700; "
                        aria-current="page">Product</a>
                </div>
            </li>
            <li class="nav-item">
                <form action="{{ route('group') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-row">
                    <i class="bi bi-people" style="font-size: 2rem; padding-right: 15px;"></i>
                    <button type="submit" class="nav-link"
                    style=" color: #44576D; font-size: 20px; font-family: Inter; font-weight: 700; "
                    aria-current="page">Group</button>
                </div>
                </form>
            </li>
            <li class="nav-item">
                <div class="d-flex flex-row">
                    <i class="bi bi-receipt" style="font-size: 2rem; padding-right: 15px;"></i>
                    <a href="#" class="nav-link"
                        style=" color: #44576D; font-size: 20px; font-family: Inter; font-weight: 700; "
                        aria-current="page">History</a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- Nav -->
    <!-- Section-->
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
