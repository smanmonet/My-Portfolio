@extends('layoutMember')
@section('title','Cart')
@section('content')
    <h2 class="text text-center py-2">Cart</h2>
    <form method="POST" action="#">
        @csrf
        <div class="card">
            <img src="{{$item ->image}}" class="rounded mx-auto d-block" alt="...">

            <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5><br>
                <p class="card-text">ราคา : {{ $item->price }}บาท </p>
                <p class="card-text">PV : {{ $item->PVPercent }}point</p>
            </div>
        </div>
    </form>
@endsection