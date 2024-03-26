<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Histiry</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <table>
        <section class="py-5">
            <div class="text-center">
                <h4>ประวัติการสั่งซื้อ</h4>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 justify-content-start">
                    <div class="col-md-6">
                        <div class="card-body p-4">
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <p>หมายเลขคำสั่งซื้อ</p>
                                            </div>
                                            <div class="col-6">
                                                <p>{{ $orderID }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p>วันที่</p>
                                            </div>
                                            <div class="col-6">
                                                <p>{{ $historyhead->date }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p>ที่อยู่</p>
                                            </div>
                                            <div class="col-6">
                                                <p>{{ $historyhead->Address }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <H3>รายการสินค้า</H3>
                                        <div class="row">
                                            <div class="col-6 text-center ">
                                                <p>ชื่อสินค้า</p>
                                            </div>
                                            <div class="col-2">
                                                <p>จำนวน</p>
                                            </div>
                                            <div class="col-2">
                                                <p>ราคา</p>
                                            </div>
                                            <div class="col-2">
                                                <p>ราคารวม</p>
                                            </div>
                                            <hr>
                                        </div>
                                        @foreach ($historybody as $his)
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>{{ $his->productname }}</p>
                                                </div>
                                                <div class="col-2">
                                                    <p>{{ $his->Quantity }}</p>
                                                </div>
                                                <div class="col-2">
                                                    <p>{{ $his->price }}</p>
                                                </div>
                                                <div class="col-2">
                                                    <p>{{ $his->SUM }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="text-center">
                                            <p>ราคารวม {{ $historybottom->SUM }} บาท</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                </div>
        </section>
</body>

</html>
