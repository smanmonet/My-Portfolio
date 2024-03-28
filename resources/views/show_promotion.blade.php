@extends('layoutStock')
@section('content')
    

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <div class="menu-bar">
            <ul class="menu-list">
                <li><a href="/stock_store" class="menu-item item-selected">Store</a></li>
                <li><a href="/Promotion" class="menu-item">Promotion</a></li>
            </ul>
        </div>
        <title>แสดงสินค้าจั้ฟ</title>
    </head>
                        {{-- <h1>{{$item->name}}</h1>
                        <h1>ราคา {{$item->price}} บาท</h1>
                        <h1>จำนวนสินค้าคงเหลือ {{$item->quantity}} ชิ้น</h1>
                        <h1>PV:{{$item->PVPercent}}</h1> --}}
    <body> 

        <section class="py-5 text-center container">
              <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                  <h1 class="fw-light">Promotion Manage</h1>
                  <p class="lead text-body-secondary">จัดการโปรโมชั่น</p>
                  <p>
                    <a href="{{route('addPromotion')}}" class="btn btn-primary my-2">Create Promotion</a>
                  </p>
                </div>
              </div>
            </section>
            <main>
                <div class="album py-5 bg-body-tertiary">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            
                            @foreach($emp as $item)
                            <div class="col order-sm-last"> <!-- ใช้ order-sm-last เพื่อให้แสดงทางขวาในหน้าจอขนาดเล็กขึ้น -->
                                <div class="card shadow-sm" >
                                    <img style="width: 100px; height: 100px;" src="{{ url('images/' . $item->image) }}"
                                                            class="rounded mx-auto d-block" alt="..." >
                                    <div class="card-body">
                                        <p class="card-text">
                                            <h1>{{$item->promotionname}}</h1>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                               
                                                <a
                                                    href="{{route('promoinfo',$item->proID)}}" 
                                                    class="btn btn-sm btn-outline-secondary"
                                                    > Info
                                                </a>
                                             
                                                <a
                                                    href="{{route('deletepromo',$item->proID)}}" 
                                                    class="btn btn-danger"
                                                    onclick="return confirm('ต้องการลบโปร {{$item->promotionname}} จริงๆบ่')"
                                                    > Delete
                                                </a>
                                            </div>
                                            {{-- <small class="text-body-secondary">9 mins</small> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </main>
            
            
            

        <script> src="js/bootstrap.min.js"</script>
    </body>  
    </html>
@endsection