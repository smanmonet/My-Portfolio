@extends('layout')
@section('title','Product')
@section('content')
    <h2>Product</h2>
    <hr>
    @foreach ($products as $item)
        <h4>{{$item["title"]}}</h4>
        
    @endforeach
@endsection