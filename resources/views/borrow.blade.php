<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9; /* เพิ่มพื้นหลังที่สว่าง */
        }

        header {
            text-align: center;
        }

        header .header-content {
            background-color: rgba(18, 193, 30, 0.638);
            width: 100%;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center; /* จัดกลางข้อความในแนวนอน */
            padding-left: 20px;
            box-sizing: border-box;
        }

        header h1 {
            margin: 0;
            color: white; /* สีตัวอักษรใน header */
        }

        .menu {
            background-color: rgb(75, 228, 241);
            width: 100%;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
        }

        .menu h1 {
            margin: 0;
            font-size: 20px;
            padding: 0 15px;
        }

        .menu a {
            text-decoration: none;
            color: black;
            font-size: 18px;
            padding: 20px;
        }

        

        table {
            margin: 20px auto; /* จัดกลางตาราง */
            border-collapse: collapse; /* สำหรับการจัดการเส้นขอบ */
            width: 80%; /* ความกว้างของตาราง */
            background-color: white; /* พื้นหลังของตาราง */
        }

        th, td {
            padding: 10px; /* เพิ่มพื้นที่ภายในเซลล์ */
            border: 1px solid black; /* เส้นขอบของตาราง */
            text-align: center; /* จัดกลางข้อความในเซลล์ */
        }

        th {
            background-color: rgba(18, 193, 30, 0.638); /* สีพื้นหลังของหัวตาราง */
            color: white; /* สีตัวอักษรของหัวตาราง */
        }

        .button-container {
            text-align: center; /* จัดกลางปุ่ม */
            margin: 20px 0; /* เพิ่มช่องว่างด้านบนและด้านล่าง */
        }

        .button-container a {
            text-decoration: none;
            color: black;
            font-size: 20px;
            padding: 10px 20px;
            border: 2px solid black;
            border-radius: 5px;
            background-color: rgba(18, 193, 30, 0.638); /* สีพื้นหลังของปุ่ม */
            color: white; /* สีตัวอักษรของปุ่ม */
        }

        .button-container a:hover {
            background-color: black; /* สีพื้นหลังของปุ่มเมื่อวางเมาส์ */
            color: white; /* สีตัวอักษรของปุ่มเมื่อวางเมาส์ */
        }
        .image-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 20px;
            padding: 20px;
            box-sizing: border-box;
        }

        .image-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 30%;
            box-sizing: border-box;
        }

        .image-item img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .image-item img.enlarged {
            transform: scale(1.5);
            z-index: 1000;
        }

        .image-item button {
            padding: 10px 20px;
            font-size: 16px; /* ขนาดตัวอักษรในปุ่ม */
            margin-top: 10px;
        }
        .logout-button {
            position: absolute; /* ตำแหน่งที่แน่นอน */
            top: 20px; /* ระยะจากด้านบน */
            right: 20px; /* ระยะจากด้านขวา */
            background-color: #f44336; /* สีแดง */
            color: white; /* สีตัวอักษร */
            border: none;
            padding: 10px 15px;
            border-radius: 5px; /* มุมมน */
            cursor: pointer; /* แสดงว่าเป็นปุ่ม */
        }

        .logout-button:hover {
            background-color: #d32f2f; /* สีแดงเข้มเมื่อ hover */
        }

    </style>
</head>

<body>

    <header>
        <div class="header-content">
          
                <h1>ห้องสมุดหรรษา</h1>
           
        </div>
    </header>

    <div class="menu">
        <h1><a href="{{ route('books.index') }}" class="active">Home</a></h1>
        <h1><a href="/room">Room</a></h1>
        <h1><a href="/borrow">Borrow</a></h1> 
        <h1><a href="{{ route('books.return') }}">Return books-equipment</a></h1>

        <!-- เพิ่มปุ่ม "เพิ่มสมาชิก" -->
        <h1><a href="{{ route('members.create') }}">Add member</a></h1>
        <h1><a href="/employee">Employee</a></h1>
    </div>
    <button class="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </button>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="image-container">
        @foreach($books as $book)
            @if($book->type === 'equipment') <!-- เพิ่มเงื่อนไขที่นี่ -->
                <div class="image-item">
                    <img src="/image/item/{{ $book->ID }}.jpg" alt="Equipment Image" onclick="toggleImageSize(this)">
                    <a href="{{ route('detailsborrow', $book->ID) }}">
                        <button>รายละเอียด</button>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
    

    

    
    <script>
        function toggleImageSize(img) {
            img.classList.toggle('enlarged');
        }
    </script>

</body>

</html>
