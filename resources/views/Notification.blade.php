@extends('layoutMember')
@section('title', 'Notification')
@section('content')
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <title>Notification</title>
    </head>

    <body>
        <h1></h1>
        <h2>การเเจ้งเตือน</h1>
            <h1></h1>
            @foreach ($noti as $n)
                <table class="table">
                    <section class="py-2">
                        <div class="card">
                            <div class="card-header">
                                แจ้งผลการโอนเงินปันผลและ/หรือโบนัส
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">เมื่อวันที่ 28 ก.พ. 2567 ทางบริษัท Supermart
                                    ได้ดำเนินการโอนเงินปันผลให้กับสมาชิก</h5>
                                <p class="card-text">ประจำเดือน: ก.พ. 2567 รวมเป็นจำนวนเงิน {{ $money }}บาท</p>
                            </div>
                        </div>
                    </section>
                </table>
            @endforeach
    </body>
    </html>
@endsection
