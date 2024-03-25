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
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">SuperMart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav" style="font-size: 20px">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                    <a class="nav-link" href="#">Promotion</a>
                    <a class="nav-link" href="/product">Product</a>
                    <a class="nav-link" href="#">Group</a>
                    <a class="nav-link" href="#">History</a>
                    
                </div>

            </div>
            <div class="d-flex flex-row justify-content-between card-footer p-4  border-top-0 bg-transparent"
                style="text-align: right">

                <img src="https://cdn-icons-png.freepik.com/256/6022/6022876.png" style="height: 40px">
                <div style="color: aliceblue ;">
                    </div>
                    @if (count((array) session('cart')) != 0)
                        <span class="text-primary-emphasis">{{ count((array) session('cart')) }}</span>
                    @else
                    <span> </span>

                    @endif
                <a style="padding: 10px ;color: rgb(170, 176, 182);padding: 10px" href="/cart" class="nav-link">
                    <h5>Cart</h5>
                </a>
                <img src="https://cdn-icons-png.freepik.com/256/6380/6380297.png?ga=GA1.1.2057235629.1711178486&" style="height: 35px">
                <a style="padding: 10px ;color: rgb(170, 176, 182)" href="#" class="nav-link">
                    <h5>User</h5>
                </a>

            </div>

        </div>
    </nav>
    <div class="container py-2">
        @yield('content')
    </div>

</body>

</html>
