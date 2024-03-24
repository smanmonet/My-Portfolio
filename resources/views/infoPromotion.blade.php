@extends('layoutpromo')
@section('content')

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <title>แสดงสินค้าจั้ฟ</title>
    </head>
                       
    <body> 

        <section class="py-5 text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12">
                        <h1 class="fw-light">Add Promotion</h1>
                        <p class="lead text-body-secondary">ต้องการจะสร้างโปรโมชั่นใช่มั้ยไอ่เวร คว</p>
                        <form class="needs-validation" novalidate="" action="{{route('submit.form')}}" method="POST">
                            @csrf

                            
                            @error('product')
                                <div class="my-2"> 
                                    <span class="text text-danger">{{$message}}</span>
                                </div>
                            @enderror
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="id" class="form-label">ไอดีโปรโมชั่น</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="PromotionID" name="PromotionID" value="{{$PromoInfo->proID}}" placeholder="" required="" readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="username" class="form-label">ชื่อโปรโมชั่น</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="PromotionName" name="PromotionName" value="{{$PromoInfo->promotionname}}" placeholder="Promotion Name" required="">
                                    </div>
                                  
                                    @error('PromotionName')
                                        <div class="my-2"> 
                                            <span class="text text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="Price" class="form-label">ราคาโปรโมชั่น</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name = "Price" value="{{$PromoInfo->price_pro}}" id="Price" placeholder="Price" required=""readonly>
                                    </div>
                                    @error('Price')
                                        <div class="my-2"> 
                                            <span class="text text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="PV" class="form-label">PV ของโปรโมชั่น</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name = "PV" value="{{$PromoInfo->pv}}" id="PV" placeholder="Promotion PV" required=""readonly>
                                    </div>
                                    @error('PV')
                                        <div class="my-2"> 
                                            <span class="text text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="Price" class="form-label">วันเริ่มโปร</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name = "pro_start" value="{{$PromoInfo->startDate}}" id="pro-start" placeholder="" required="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="PV" class="form-label">วันหมดโปร</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name = "pro_end" value="{{$PromoInfo->endDate}}" id="pro-end" placeholder="" required="" readonly>
                                    </div>
                                </div>
                            </div>
                            <main >
                                <div class="album py-5 bg-body-tertiary ">
                                    <div class="container">
                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
                                            @foreach($PdInfo as $item)
                                            <div class="col order-sm-last"> <!-- ใช้ order-sm-last เพื่อให้แสดงทางขวาในหน้าจอขนาดเล็กขึ้น -->
                                                <div class="card shadow-sm">
                                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                                        <title>Placeholder</title>
                                                        <rect width="100%" height="100%" fill="#55595c"></rect>
                                                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                                    </svg>
                                                    <div class="card-body .bg-light">
                                                        <p class="card-text">
                                                            <h1>{{$item->name}}</h1>
                                                            <h1>{{$item->productID}}</h1>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="{{$item->name}}" name="product[]" value="{{$item->name}}|{{$item->productID}}">
                                                                <input type="hidden" class="hidden-product"  name="productID[]" value="{{$item->productID}}">
                                                            </div>
                                                            
                                                        </p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                            </div>
                                                            <small class="text-body-secondary">9 mins</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        
                                    </div>
                                </div>
                            </main>
                            <hr class="my-4">
                            <button class="w-50 btn btn-primary btn-lg" type="submit">สร้างโปรโมชั่น</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

            
            
            

        <script> src="js/bootstrap.min.js"</script>
    </body>  
    </html>
@endsection