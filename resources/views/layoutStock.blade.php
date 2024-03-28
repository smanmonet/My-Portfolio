<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | SuperMart</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
            <div class="p-2 g-col-5 "></div>
            <img src="https://cdn-icons-png.freepik.com/256/6380/6380297.png?ga=GA1.1.2057235629.1711178486&"
                style="height: 35px">
                <a style="color: rgb(170, 176, 182);padding: 10px" href="/cart" class="nav-link">
                <h5>Stock</h5>
            </a>
            <a style="padding: 10px ;color: rgb(170, 176, 182)" href="#" class="nav-link">
                <h5>@yield('User')</h5>
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="d-flex  " role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>

        </div>
        </div>
    </nav>
    <nav class="flex-row" style="background-color: #AAB8C1; height: 65px; display: flex; align-items: center; padding-left: 50px;">
    <h4 style="margin-right:20px">Select Role : </h4>
    <select id="dynamic_select" style="border-radius: 10px" name="change" class="change">
                <option value="" selected disabled >switch role</option>
                @foreach($role as $role)
                    <option value="{{$role->roletypeID}}">{{ $role->nameType }}</option>

                @endforeach
            </select>
</nav>
    <!-- Nav -->
    {{-- data-bs-theme="dark" --}}
    <div class="container py-2">
        @yield('content')
    </div>
    <script>
    $(function (){
        $('#dynamic_select').on('change', function () {
          var id = $(this).val(); // get selected value
          if (id==1) { window.location = "/Finance";console.log("Hello") }
          else if(id==2){ }
          else if(id==3){window.location = "/stock_store";}
          else if(id==4){window.location = "/HomeHR";}
          return false;
      });
    });
</script>
</body>

</html>
