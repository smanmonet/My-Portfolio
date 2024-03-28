@section('title', 'HistortInfo')
@section('User', $HisInfo_name['name'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | SuperMart</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg" style=" background: #25393C">
        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" style="width: 175px;" alt="logo">
        </div>
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between card-footer p-4  border-top-0 bg-transparent  "
            style="text-align: right">
            <a style="color: rgb(255, 255, 255)"; href="/Notification" class="nav-link">
                <i class="bi bi-bell-fill" style="font-size: 30px; margin: 25px;"></i>
            </a>
            <img src="https://cdn-icons-png.freepik.com/256/6022/6022876.png" style="height: 40px">
            <div style="color: aliceblue ;">
            </div>
            @if (count((array) session('cart')) != 0)
                <span class="text-primary-emphasis">{{ count((array) session('cart')) }}</span>
            @else
                <span></span>
            @endif
            <a style="color: rgb(170, 176, 182);padding: 10px" href="/cart" class="nav-link">
                <h5>Cart</h5>
            </a>
            <div class="p-2 g-col-5 "></div>
            <img src="https://cdn-icons-png.freepik.com/256/6380/6380297.png?ga=GA1.1.2057235629.1711178486&"
                style="height: 35px">
            <a style="padding: 10px ;color: rgb(170, 176, 182)" href="#" class="nav-link">
                <h5>@yield('User')</h5>
            </a>
            <form action="{{ route('logout') }}" method="POST" class="d-flex  " role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <nav class="flex-row" style="background-color: #AAB8C1; height: 65px;">
        <a href="/History" class="nav-link">
            <i class="bi bi-arrow-left-square" style="font-size: 45px; margin: 20px;"></i>
        </a>
    </nav>
    <table>
        <section class="py-5">
            <div class="text-center">
                <h4>ประวัติการสั่งซื้อ</h4>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 justify-content-start">
                    <div class="col-md-6">
                        <div class="card-body p-4">
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <p>หมายเลขคำสั่งซื้อ</p>
                                            </div>
                                            <div class="col-6">
                                                <p>{{ $orderID }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p>วันที่</p>
                                            </div>
                                            <div class="col-6">
                                                <p>{{ $historyhead->date }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p>ที่อยู่</p>
                                            </div>
                                            <div class="col-6">
                                                <p>{{ $historyhead->Address }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <H3>รายการสินค้า</H3>
                                        <div class="row">
                                            <div class="col-6 text-center ">
                                                <p>ชื่อสินค้า</p>
                                            </div>
                                            <div class="col-2">
                                                <p>จำนวน</p>
                                            </div>
                                            <div class="col-2">
                                                <p>ราคา</p>
                                            </div>
                                            <div class="col-2">
                                                <p>ราคารวม</p>
                                            </div>
                                            <hr>
                                        </div>
                                        @foreach ($historybody as $his)
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>{{ $his->productname }}</p>
                                                </div>
                                                <div class="col-2">
                                                    <p>{{ $his->Quantity }}</p>
                                                </div>
                                                <div class="col-2">
                                                    <p>{{ $his->price }}</p>
                                                </div>
                                                <div class="col-2">
                                                    <p>{{ $his->SUM }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="text-center">
                                            <p>ราคารวม {{ $historybottom->SUM }} บาท</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                </div>
        </section>
</body>

</html>
