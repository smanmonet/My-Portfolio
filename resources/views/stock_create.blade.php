<div class="container">

<!DOCTYPE html>
<html>
<head>
    <title>Supermart - New Inventory Item</title>
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

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFF;
            margin: 20px;
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
            <h3 style="margin-bottom: 20px;">New inventory item</h3>
            @if(Session::has('popup_message'))
            <div class="alert alert-danger">
            {{ Session::get('popup_message') }}
            </div>
            @endif
            <form method="POST" action="/product/created" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" id="productname" name="productname" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="price">Selling Price</label>
                    <input type="number" id="price" name="price" class="form-control" min="0">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity in Stock</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" min="0">
                </div>
                <div class="form-group">
                    <label for="Min">Min</label>
                    <textarea id="Min" name="Min" style="background-color: #DFEBF6" class="form-control"></textarea>
                <div class="form-group">
                    <label for="PVPercent">PVPercent</label>
                    <textarea id="PVPercent" name="PVPercent" style="background-color: #DFEBF6" class="form-control"></textarea>

                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('stock_store') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
    </div>

