<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Data</title>
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
            font-weight: bold;
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

        h1 {
            text-align: center;
            padding: 20px;
            margin: 0;
            font-size: 24px;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin: 20px auto;
            max-width: 900px;
            gap: 20px;
        }

        img {
            width: 300px;
            height: auto;
            border-radius: 8px;
            border: 2px solid #ddd;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 100%;
            max-width: 500px;
            background-color: white;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid black;
            text-align: center;
        }

        th {
            background-color: rgba(18, 193, 30, 0.638);
            color: white;
        }

        td {
            font-size: 16px;
        }

        .button-container {
            text-align: center;
            margin: 20px;
        }

        .button-container a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: rgba(18, 193, 30, 0.638);
            color: white;
            font-size: 16px;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .button-container a:hover {
            background-color: rgba(15, 170, 25, 0.8);
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
        <img src="/image/item/{{ $books->ID }}.jpg" alt="Library Image" />

        <div class="borrowsdetails">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Max</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $books->book_name }}</td>
                        <td>{{ $books->description }}</td>
                        <td>{{ $books->max }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="button-container">
                <a href="{{ route('borrow.confirm', $books->ID) }}">Borrow</a>
            </div>
        </div>
    </div>

</body>

</html>
