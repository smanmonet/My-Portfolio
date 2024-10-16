<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
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
      
        .image-container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
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
            width: 90%;
            max-height: 500px;
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
            font-size: 16px;
            margin-top: 10px;
        }
        .image-item a {
            text-decoration: none;
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
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        @foreach($members as $member)
        <div class="image-item">
            <img src="/image/admin/{{ $member->ID }}.jpg" alt="Employee Image" onclick="toggleImageSize(this)">
            <p>{{$member->name}}</p>
        </div>
        @endforeach
    </div>

    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    <script>
        function toggleImageSize(img) {
            img.classList.toggle('enlarged');
        }
    </script>
</body>
</html>
