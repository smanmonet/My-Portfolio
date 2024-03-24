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
                        {{-- <h1>{{$item->name}}</h1>
                        <h1>ราคา {{$item->price}} บาท</h1>
                        <h1>จำนวนสินค้าคงเหลือ {{$item->quantity}} ชิ้น</h1>
                        <h1>PV:{{$item->PVPercent}}</h1> --}}
    <body> 

        <section class="py-5 text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12">
                        <h1 class="fw-light">Confirm Promotion</h1>
                        <p class="lead text-body-secondary">ต้องการจะยืนยันโปรโมชั่นใช่มั้ยไอ่เวร คว</p>
                        <form class="needs-validation" novalidate="" action="{{route('confirm.form')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="username" class="form-label">ชื่อโปรโมชั่น</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="PromotionName" name="PromotionName" value="{{$formData['PromotionName'] }}" placeholder="" required=""readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="proID" class="form-label"></label>
                                    <div class="input-group has-validation">
                                        <input type="hidden" class="form-control" id="PromotionID" name="PromotionID" value="{{$formData['PromotionID'] }}" placeholder="" required=""readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="Price" class="form-label">ราคาโปรโมชั่น</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name = "Price" value="{{$formData['Price'] }}" id="Price" placeholder="" required="" readonly>
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <label for="Price" class="form-label"></label>
                                    <div class="input-group has-validation">
                                        <input type="hidden" class="form-control" name = "Price" value="{{$formData['PromotionID'] }}" id="Price" placeholder="" required="" readonly>
                                    </div>
                                </div> --}}

                                <div class="col-md-6">
                                    <label for="PV" class="form-label">PV ของโปรโมชั่น</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name = "PV" value="{{$formData['PV'] }}" id="PV" placeholder="" required="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="Price" class="form-label">วันเริ่มโปร</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name = "pro_start" value="{{$formData['pro-start'] }}" id="pro-start" placeholder="" required="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="PV" class="form-label">วันหมดโปร</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name = "pro_end" value="{{$formData['pro-end'] }}" id="pro-end" placeholder="" required="" readonly>
                                    </div>
                                </div>
                                <p>สินค้าที่เลือก : </p>
                                @foreach ($formData['productNames'] as $key => $value)
                                    <div class="col-md-6">
                                        <label for="Product" class="form-label"></label>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control" name = "productName" value="{{ $value }}" id="productName" placeholder="" required="" readonly>
                                        </div>
                                    </div>
                                @endforeach
                                @foreach ($formData['productIDs'] as $key => $value)
                                    <div class="col-md-6">
                                        <label for="Product" class="form-label"></label>
                                        <div class="input-group has-validation">
                                            <input type="hidden" class="form-control" name = "productID[]" value="{{ $value }}" id="productID" placeholder="" required="" readonly>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <hr class="my-4">
                            <button class="w-50 btn btn-primary btn-lg" type="submit">สร้างโปรโมชั่น</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
        
            <main >
                <div class="album py-5 bg-body-tertiary ">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
                        
                        </div>
                        
                    </div>
                </div>
            </main>
            
            
            

        <script> src="js/bootstrap.min.js"</script>
    </body>  
    </html>
@endsection