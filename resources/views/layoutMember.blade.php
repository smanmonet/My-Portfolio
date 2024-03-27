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
    <!-- Styles -->



</head>

<body>

    <nav class="navbar navbar-expand-lg" style=" background: #25393C">
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
            <img src="https://cdn-icons-png.freepik.com/256/6380/6380297.png?ga=GA1.1.2057235629.1711178486&"
                style="height: 35px">
            <div class="p-2 g-col-6 "></div>
            <form action="{{ route('logout') }}" method="POST" class="d-flex  " role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>
            <a style="padding: 10px ;color: rgb(170, 176, 182)" href="#" class="nav-link">
                <h5>@yield('User')</h5>
            </a>
        </div>
        </div>
    </nav>
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
                    <a href="promotions" class="nav-link "
                        style=" color: #44576D; font-size: 20px; font-family: Inter; font-weight: 700; "
                        aria-current="page">Promotion</a>
                </div>
            </li>
            <li class="nav-item">
                <div class="d-flex flex-row">
                    <i class="bi bi-bag" style="font-size: 2rem; padding-right: 15px;"></i>
                    <a href="/product" class="nav-link"
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
                    <a href="/History" class="nav-link"
                        style=" color: #44576D; font-size: 20px; font-family: Inter; font-weight: 700; "
                        aria-current="page">History</a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- Nav -->
    {{-- data-bs-theme="dark" --}}
    <div class="container py-2">
        @yield('content')
    </div>

</body>

</html>
