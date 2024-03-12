@extends('layout')
@section('title', 'Product')
@section('content')
    <h2 class="text text-center py-2">Product</h2>
    <!---<table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">ราคา</th>
                        <th scope="col">PV rate</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
    <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->PVPercent }}</td>
                            <td>
                                @if ($item->quantity > $item->Min)
    <p class = "text text-success">{{ $item->quantity }}</p>
@elseif ($item->quantity <= $item->Min and $item->quantity > 0)
    <p class = "text text-warning ">{{ $item->quantity }}</p>
@elseif ($item->quantity == 0)
    <p class = "text text-danger">หมด</p>
    @endif
                            </td>
                            <td><a href="#" class="btn btn-dark">-</a><a href="#" class="btn btn-dark">+</a></td>
                            <td><a href="#" class="btn btn-dark">ใส่รถเข็น</a> </td>
                        </tr>
    @endforeach
                </tbody>
            </table>!--->
    @foreach ($products as $item)
        <div class="card">
            <img src="..." class="card-img-top" alt="...">

            <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5><br>
                <p class="card-text">ราคา : {{ $item->price }}บาท </p>
                <p class="card-text">PV : {{ $item->PVPercent }}point</p>
                @if ($item->quantity > $item->Min)
                    <p class = "text text-success">จำนวนสินค้าในคลัง : {{ $item->quantity }} ชิ้น</p>
                    <a href="#" class="btn btn-dark">-</a>
                    <a href="#" class="btn btn-dark">+</a><br>
                    <br>
                    <p><a href="#" class="btn btn-dark">ใส่รถเข็น</a></p>
                @elseif ($item->quantity <= $item->Min and $item->quantity > 0)
                    <p class = "text text-warning ">จำนวนสินค้าในคลัง : {{ $item->quantity }} ชิ้น</p>
                    <a href="#" class="btn btn-dark">-</a>
                    <a href="#" class="btn btn-dark">+</a><br>
                    <br>
                    <p><a href="#" class="btn btn-dark">ใส่รถเข็น</a></p>
                @elseif ($item->quantity == 0)
                    <p class = "text text-danger">สินค้าหมด</p>
                @endif
                <!---<a href="#" class="btn btn-dark">-</a>
                    <a href="#" class="btn btn-dark">+</a><br>
                    <br><p><a href="#"  class="btn btn-dark">ใส่รถเข็น</a></p>!--->
            </div>
        </div>
    @endforeach
@endsection
