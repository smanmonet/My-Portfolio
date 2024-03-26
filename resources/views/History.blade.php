<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body> 
    <table class="table">
        <section class="py-5">
            <div class="text-center">
                <h4>ประวัติการสั่งซื้อ</h4>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 justify-content-start">
                    @foreach ($historyhead as $item)
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
                                                <p>{{ $item->orderID }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p>วันที่</p>
                                            </div>
                                            <div class="col-6">
                                                <p>{{ $item->date }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p>ที่อยู่</p>
                                            </div>
                                            <div class="col-6">
                                                <p>{{ $item->Address }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="container-info">
                                            <a href="{{ route('info', $item->orderID) }}"
                                                class="btn btn-sm btn-outline-secondary">Info
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </table>
</body>

</html>
