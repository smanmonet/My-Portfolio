<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
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
            font-size: 32px;
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

        .content {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin: 20px auto;
            max-width: 1200px; /* เพิ่มความกว้างสูงสุด */
            gap: 30px;
        }

        .content img {
            max-width: 100%; /* ทำให้รูปภาพขยายเต็มพื้นที่ */
            height: auto;
            border: 2px solid #ddd;
            border-radius: 8px;
        }

        .details {
            flex: 1; /* ให้รายละเอียดขยายเต็มพื้นที่ที่เหลือ */
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* เงาให้รายละเอียด */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: white;
        }

        th,
        td {
            padding: 15px;
            border: 1px solid black;
            text-align: center;
        }

        th {
            background-color: rgba(18, 193, 30, 0.638);
            color: white;
            font-size: 16px;
        }

        td {
            font-size: 14px;
        }

        .booking-button {
            padding: 10px 20px;
            background-color: rgba(18, 193, 30, 0.638);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .booking-button:hover {
            background-color: #0a7d1f;
        }

        .unavailable-message {
            color: red;
            font-size: 16px;
            text-align: center;
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

    <div class="content">
        <img src="/image/room/{{ $rooms->ID }}.jpg" alt="Library Image" />

        <div class="details">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $rooms->name }}</td>
                        <td>{{ $rooms->description }}</td>
                        <td>{{ $rooms->status }}</td>
                    </tr>
                </tbody>
            </table>

            <div style="padding: 20px; text-align: center;">
                @if ($rooms->status === 'available')
                    <a href="{{ route('bookings.create', $rooms->ID) }}">
                        <button class="booking-button">Booking</button>
                    </a>
                @else
                    <p class="unavailable-message">This room is unavailable for booking.</p>
                @endif
            </div>
        </div>
    </div>

</body>

</html>
