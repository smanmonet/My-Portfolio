@extends('layoutStock')
@section('title', 'Stock_Edit')
@section('content')
<div class="container">

<!DOCTYPE html>
<html>
<head>
    <title>Supermart - Edit Inventory Item</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #AAC7DB;
            color: #000;
            padding: 20px;
            border-radius: 5px;
            display: flex;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .form-section {
            flex: 1;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        .btn {
            padding: 8px 16px;
            border-radius: 3px;
            border: none;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }
        .image-upload {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            margin-left: 20px;
        }
        input[type="file"] {
        color: transparent;
        }
        input[type="text"] {
        background-color: #DFEBF6;
        }
        input[type="number"] {
        background-color: #DFEBF6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h3 style="margin-bottom: 20px;">Edit inventory item</h3>
            @if(Session::has('popup_message'))
            <div class="alert alert-danger">
            {{ Session::get('popup_message') }}
            </div>
            @endif
            <form method="POST" action="product/{{ $products->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT method for update -->
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" id="productname" name="productname" class="form-control" placeholder="Name" value="{{ $products->productname }}">
                </div>
                <div class="form-group">
                    <label for="price">Selling Price</label>
                    <input type="number" id="price" name="price" class="form-control" min="0" value="{{ $products->price }}">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity in Stock</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" min="0" value="{{ $products->quantity }}">
                </div>
                <div class="form-group">
                    <label for="Min">Min</label>
                    <textarea id="Min" name="Min" style="background-color: #DFEBF6" class="form-control">{{ $products->Min }}</textarea>
                </div>
                <div class="form-group">
                    <label for="PVPercent">PVPercent</label>
                    <textarea id="PVPercent" name="PVPercent" style="background-color: #DFEBF6" class="form-control">{{ $products->PVPercent }}</textarea>
                </div>
                <div class="form-group">
    <label for="image">Image</label>
    @if($products->image)
        <img style="width: 100px; height: 100px;" src="{{ asset('images/' . $products->image) }}" alt="Current Image">
    @endif
    <input type="file" id="image" name="image" class="form-control-file" onchange="displayFileName(this)">
    <span id="filenameSpan">
        @if($products->image)
            {{ $products->image }}
        @else
            Choose File
        @endif
    </span>
</div>
                <input type="hidden" name="product_id" value="{{ $products->id }}"> <!-- Hidden input for product ID -->
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update</button> <!-- Change button text to "Update" -->
                    <a href="{{ route('stock_store') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>

        
    </div>
</body>
</html>

    </div>
    <script>
    function displayFileName(input) {
        const filenameSpan = document.getElementById('filenameSpan');
        if (input.files && input.files[0]) {
            filenameSpan.innerText = input.files[0].name;
        } else {
            filenameSpan.innerText = 'Choose File';
        }
    }
    </script>
@endsection