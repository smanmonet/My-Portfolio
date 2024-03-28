<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's Go</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background: #25393C; /* เปลี่ยนสีพื้นหลังเป็นสีเข้ม */
            font-family: Arial, sans-serif; /* เปลี่ยนแบบอักษร */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        .logo img {
            width: 200px; /* ปรับขนาดรูปภาพโลโก้ */
        }

        .th-one {
            margin-top: 20px; /* ระยะห่างของปุ่ม Let's Go จากโลโก้ */
        }

        .letgo {
            background-color: #007bff; /* สีปุ่ม */
            color: #fff; /* สีข้อความ */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s ease; /* เพิ่มการเปลี่ยนสีพื้นหลังเมื่อ hover */
        }

        .letgo:hover {
            background-color: #0056b3; /* เปลี่ยนสีเมื่อ hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="<?= asset('logo/logo.png') ?>"></img>
        </div>
        <div class="th-one">
            <button class="letgo"><a href="/HomeHR" class="text-white text-decoration-none">Let's Go</a></button>
        </div>
    </div>
</body>

</html>
