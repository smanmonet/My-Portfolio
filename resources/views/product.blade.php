@extends('layoutMember')
@section('title', 'Product')
@section('User', $ses['name'])
@section('content')

    <h2 class="text text-center py-2">Product</h2>
    @if (isset($products))
        @if (@session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container-fluid">
            <form class="d-flex" action="{{ route('product') }}" method="GET">
                <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div><br>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
                    @foreach ($products as $item)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <img src="{{ url('images/' . $item->image) }}" class="rounded mx-auto d-block"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->productname }}</h5><br>
                                    <p class="card-text">ราคา : {{ $item->price }}บาท </p>
                                    <p class="card-text">PV : {{ $item->PVPercent }}point</p>
                                    @if ($item->quantity != 0)
                                        <p class = "text text-success">สินค้าในคลัง : {{ $item->quantity }} ชิ้น</p>
                                        &nbsp;&nbsp;
                                        <a href="{{ route('cartAdd', $item->productID) }}"
                                            class="btn btn-dark">ใส่รถเข็น</a>
                                    @else
                                        <p class = "text text-danger">สินค้าหมด</p>
                                    @endif
                                </div>
                                <br>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <div class="container-fluid">
            <form class="d-flex" action="{{ route('product') }}" method="GET">
                <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div><br>
        <div class="alert alert-warning">
            {{ $message }}
        </div>
    @endif
@endsection
