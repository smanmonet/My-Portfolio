@extends('layoutMember')
@section('title', 'Notification')
@section('User', $noti_name['name'])
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
            @php
                $x=0;
            @endphp
            @foreach ($noti as $n)
                <table class="table">
                    <section class="py-2">
                        <div class="card">
                            <div class="card-header">
                                แจ้งผลการโอนเงินปันผลหรือโบนัส
                            </div>
                            <div class="card-body">
                                <p class="card-title">เมื่อวันที่ {{ $n->Date }} ทางบริษัท Supermart
                                    ได้ดำเนินการโอนเงินปันผลให้กับสมาชิก</p>
                                <p class="card-text">รวมเป็นจำนวนเงิน {{ $money[$x] }}บาท</p>
                            </div>
                        </div>
                    </section>
                </table>
                @php
                $x+=1;
                @endphp
            @endforeach
    </body>
    </html>
@endsection
