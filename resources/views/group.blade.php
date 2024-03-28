@extends('layoutMember')
@section('title', 'Promotion')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Group</title>

</head>

<body>
    
    <section class="py-5">
        @foreach($alldownline as $all)
            <div style="display: none">
                <div style="">{{$allpv += $all->PV}}</div>
            </div>
        @endforeach
        <div class="d-flex flex-column justify-content-center align-items-center " style="margin-top:0px; color: #44576D; font-size: 35px; font-family: Inter; font-weight: 700; gap:12px;">
            <div style="margin-top:0px;">
                <img class="card-img-top" src="https://i.pinimg.com/564x/86/ff/31/86ff31cff83795e5c07d48794facf7c2.jpg"
                alt="..." />
            </div>
            
                <div class="d-flex flex-row" style="gap:12px;margin-top:5px;">
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
@endsection