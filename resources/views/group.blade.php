<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Group</title>

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
                    <a href="promotions" class="nav-link "
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
                        <button type="submit" class="nav-link active"
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
    <section class="py-5">
        @foreach($alldownline as $all)
            <div style="display: none">
                <div style="">{{$allpv += $all->PV}}</div>
            </div>
        @endforeach
        <div class="d-flex flex-column justify-content-center align-items-center " style="margin-top:0px; color: #44576D; font-size: 35px; font-family: Inter; font-weight: 700; gap:12px;">
            <div style="margin-top:0px;">
                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                alt="..." />
            </div>
            
                <div class="d-flex flex-row" style="gap:12px;margin-top:20px;">
                    <div>
                        {{$member->Name}}  {{$member->Surname}}
                    </div>
                    <div style="color: red;">
                        {{$member->PV}} 
                    </div>
                    points
                </div>
                <div class="d-flex flex-row" style="gap:12px;">
                    PV รวมทั้งหมด  <div style="color: red;"> {{$allpv}} </div> points
                </div>
                <div style="margin: 25px;margin-top: 45px; margin-right:50%;font-size: 32px">
                    สมาชิกในกลุ่ม
                </div>
        </div>
        <div class="container px-4 px-lg-5 " style="margin-top: -15px;">
            @foreach($alldownline as $all)
            @if ($ordinal == -1)
               <div style="display: none"> {{$ordinal += 1}}</div>
            @else
            <div class="d-flex flex-row justify-content-between" style=" margin-top:20px; color: #44576D; font-size: 30px; font-family: Inter; font-weight: 700">
                <div style="margin-left: 150px;">
                   {{$ordinal += 1}}. {{$all->Name}} - {{$all->Surname}}
                </div>
                <div class="d-flex flex-row" style="color:red;margin-right: 150px;gap:10px;">
                    {{$all->PV}} <div style="color:#44576D;"> points</div>
                </div>
                
            </div>
            @endif
            @endforeach
        </div>
    </section>