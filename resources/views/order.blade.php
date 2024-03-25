@extends('layoutMember')
@section('title', 'Order')
@section('content')
    <html>

    <head>
        <h2 style="text-align: center" style="padding: 60px">ใบแจ้งชำระ</h2>
    </head>

    <body>

        <div class="d-flex justify-content-center">
            <div class=" justify-content-center align-items-end" style="padding-top:10px">
                <form class="needs-validation" novalidate="" action="{{ route('confirm') }}"method="POST">
                    <div class="col m-0 " style="width:1000px;">
                        <div class="d-flex card h-50" style="border-radius:20px;">
                            <div class="d-flex flex-row justify-content-around card-body p-4">

                                <div class="d-flex flex-column text-start">
                                    <h7 class="fw-bolder">name</h7>
                                    akmanrisal@ku.th
                                </div>
                                <div class="d-flex flex-column text-start">
                                    <h7 class="fw-bolder">รหัสคำสั่งซื้อ</h7>
                                    sman106
                                </div>
                                <div class="d-flex flex-column text-start">
                                    <h7 class="fw-bolder">วันที่สั่งซื้อ</h7>
                                    <?php
                                    $day = date('d m Y');
                                    echo "$day";
                                    ?>
                                </div>
                                <div class="d-flex flex-column text-start">
                                    <h7 class="fw-bolder">ที่อยู่</h7>
                                    มหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตกำแพงแสน
                                </div>

                            </div>

                            <div class="d-flex flex-row justify-content-between card-body p-4">
                                <div class="d-flex flex-row justify-content-between" style="margin-left:40px">
                                    <h6 class="fw-bolder">รายการสินค้า</h6>
                                </div>
                                <div style="margin-right:60px;">
                                </div>
                            </div>

                            <!--เก็บข้อมูลสินค้า-->
                            <div class="d-flex flex-column justify-content-between card-body p-4">
                                <div class="d-flex flex-column justify-content-between" style="margin-left:40px">

                                    @if (session('cart'))
                                        @foreach (session('cart') as $productID => $details)
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <div class="d-flex flex-column text-start"style="margin-left:40px">
                                                        <label for="name" class="form-label">ชื่อสินค้า</label>
                                                        <div class="input-group has-validation">
                                                            <input class="form-control" id="name" name="name[]"
                                                                value="{{ $details['name'] }}" placeholder=""
                                                                required=""readonly>
                                                        </div>

                                                        <div>
                                                            <label for="productID" class="form-label">รหัสสินค้า</label>
                                                            <div class="input-group has-validation">
                                                                <input class="form-control" id="productID" name="productID[]"
                                                                    value="{{ $details['productID'] }} " placeholder=""
                                                                    required=""readonly>

                                                            </div>
                                                            <div>
                                                                <label for="quantity" class="form-label">จำนวน</label>
                                                                <div class="input-group has-validation">
                                                                    <input class="form-control" id="quantity"
                                                                        name="quantity[]"
                                                                        value="{{ $details['quantity'] }}"
                                                                        placeholder="" required=""readonly>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <label for="price" class="form-label">ราคารวม</label>
                                                                <div class="input-group has-validation">
                                                                    <input class="form-control" id="price"
                                                                            name="price[]"
                                                                            value="{{ $details['price'] * $details['quantity'] }}บาท"
                                                                            placeholder="" required=""readonly>
                                                                </div>
                                                        


                                                            </div>
                                                            <div style="display: none">
                                                                {{ $sum += $details['price'] * $details['quantity'] }}</div>
                                                            <br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!--เก็บข้อมูลสินค้า-->

                            <!--SUMMARY RECEIPT-->
                            <div class="d-flex flex-row justify-content-between card-body p-4">
                                <div>
                                    <h7 class="fw-bolder">ยอดรวม</h7>
                                </div>
                                <div style="margin-right:50px;">
                                    <br>
                                    <h7 class="fw-bolder">ราคารวม {{ $sum }} บาท</h7>

                                </div>
                            </div>
                            
                            <!--EVIDENCE RECEIPT-->
                            <div class="d-flex flex-row justify-content-start card-body p-4">
                                <div>
                                    <h7 class="fw-bolder">ช่องทางการชำระเงิน</h7>
                                    <div class="d-flex flex-row justify-content-between" style="margin-left:50px;">
                                        <br>
                                        ธนาคารกสิกรไทย เลขบัญชี 045-xxxxxxx ชื่อบัญชี นายสมศักดิ์ เจริญพร
                                    </div>
                                </div>


                            </div>

                            <div class="d-flex flex-row justify-content-start card-body p-4">
                                <div>
                                    <h7 class="fw-bolder">หลักฐานการชำระเงิน*</h7><br>
                                    <br><img
                                        src="https://png.pngtree.com/png-vector/20190501/ourmid/pngtree-payment-icon-design-png-image_1013026.jpg"
                                        style="height: 150px">
                                </div>

                            </div>

                            <div class="d-flex flex-row justify-content-between card-footer p-4  border-top-0 bg-transparent"
                                style="">


                                <div>
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                      
                                        @csrf
                                        <input type="file" name="image">
                                        <button type="submit">Upload</button>
                                        
                                    </form>
                                </div>

                                <div style="margin-right:40px" class="text-center">
                                    <button type="submit" class="btn btn-outline-dark mt-auto">Confirm</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </body>

    </html>
@endsection
