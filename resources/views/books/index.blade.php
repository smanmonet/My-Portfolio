<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดหนังสือ</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
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
            justify-content: center;
            padding-left: 20px;
            box-sizing: border-box;
        }

        header h1 {
            margin: 0;
            color: white;
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

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .search-form {
            display: flex;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        .search-form input[type="text"] {
            flex: 1;
            padding: 10px;
            font-size: 16px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-form button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #45a049;
        }

        .book-grid {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .book {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 200px; /* ขนาดของ container แต่ละเล่ม */
            box-sizing: border-box;
        }

        .book img {
            width: 100%; /* ให้เต็ม container */
            height: auto; /* ให้ปรับความสูงตามสัดส่วน */
            max-width: 200px;
            max-height: 300px;
            object-fit: contain; /* รักษาสัดส่วนของรูปภาพ */
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .book-name {
            font-size: 18px;
            margin-top: 10px;
            text-align: center;
        }

        .no-results {
            color: red;
            font-size: 18px;
            text-align: center;
            margin-top: 20px;
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

    <!-- Header Section -->
    <header>
        <div class="header-content">
            <h1>ห้องสมุดหรรษา</h1>
        </div>
    </header>

    <!-- Navbar Section -->
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

    <!-- Search Form -->
    <div class="container">
        <form action="{{ route('books.search') }}" method="GET" class="search-form">
            <input type="text" name="query" placeholder="ค้นหาหนังสือ" required>
            <button type="submit">ค้นหา</button>
        </form>
    </div>

    <!-- Book Results -->
    <div class="container">
        @if($books->isEmpty())
            <div class="no-results">ไม่พบหนังสือที่เกี่ยวข้อง</div>
        @else
            <div class="book-grid">
                @foreach($books as $book)
                <div class="book">
                    <a href="{{ route('books.show', $book->ID) }}">
                        <img src="image/book/{{ $book->ID}}.jpg" alt="{{ $book->book_name }}">
                        <div class="book-name">{{ $book->book_name }}</div>
                    </a>
                </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>