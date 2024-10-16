<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        header {
    background-color: rgba(18, 193, 30, 0.638);
    width: 100%;
    height: 150px;
    display: flex;
    align-items: center; /* จัดให้อยู่ตรงกลางในแนวตั้ง */
    justify-content: center; /* จัดให้อยู่ตรงกลางในแนวนอน */
    text-align: center;
    box-sizing: border-box;
}

header h1 {
    margin: 0;
    color: white;
    font-size: 32px;
    height: 100%; /* เพิ่มเพื่อให้ h1 สูงเท่ากับ header */
    display: flex;
    align-items: center; /* จัดข้อความใน h1 ให้อยู่ตรงกลางในแนวตั้ง */
    justify-content: center; /* จัดข้อความใน h1 ให้อยู่ตรงกลางในแนวนอน */
    font-weight: bold;
}



       
        

        .menu {
            background-color: rgb(75, 228, 241);
            width: 100%;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
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

        .booking-form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .booking-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .booking-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 16px;
        }

        .booking-form select,
        .booking-form input[type="date"],
        .booking-form input[type="number"],
        .booking-form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .booking-form button {
            background-color: rgba(18, 193, 30, 0.638);
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .booking-form button:hover {
            background-color: #0a7d1f;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border: 2px solid green;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .popup h2 {
            color: green;
        }

        .popup button {
            margin-top: 10px;
            padding: 10px;
            background-color: rgba(18, 193, 30, 0.638);
            color: white;
            border: none;
            cursor: pointer;
        }

        .popup button:hover {
            background-color: #0a7d1f;
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header>
        <h1>ห้องสมุดหรรษา</h1>
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

    <div class="booking-form">
        <h2>กรอกข้อมูลการยืมของ</h2>

        <form action="{{ route('borrow.stores') }}" method="POST">
            @csrf
            <p>ชื่อสิ่งของ: {{ $books->book_name }}</p>

            <input type="hidden" name="book_id" value="{{ $books->ID }}">

            <label for="member_id">ชื่อผู้จอง
                <span style="display: inline-block; margin-left: 10px;">
                    <button type="button" class="btn btn-primary btn-sm" id="memberSelectBtn">เลือกสมาชิก</button>
                </span>
            </label>
            <p id="selectedMember" data-id="" style="margin-top: 10px;">สมาชิก: ยังไม่เลือก</p>
            <p id="selectedMemberCode" style="margin-top: 10px;">รหัสสมาชิก: ยังไม่เลือก</p>
            <input type="hidden" name="member_id" id="member_id" required>

            <label for="quantity">จำนวนที่ยืม:</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1" required>

            <label for="date">วันที่จอง:</label>
            <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}" required
                onchange="setReturnDate()">

            <label for="return_date">วันที่คืน:</label>
            <input type="date" id="return_date" name="return_date" required>

            <button type="submit">Borrow</button>
        </form>
    </div>

    <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="memberModalLabel">เลือกสมาชิก</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="memberSearch" placeholder="ค้นหาชื่อสมาชิกหรือรหัสสมาชิก..." class="form-control" onkeyup="filterMembers()">
                    <ul id="memberList" class="list-group mt-2">
                        @foreach ($members as $member)
                        <li class="list-group-item member-item" 
                            data-name="{{ $member->name }}" 
                            data-code="{{ $member->member_code }}" 
                            onclick="selectMember({{ $member->ID }}, '{{ $member->name }}', '{{ $member->member_code }}')">
                            {{ $member->member_code }} {{ $member->name }}
                        </li>
                        @endforeach
                    </ul>
                    <p class="warning-text">คลิกที่ชื่อที่ต้องการเพื่อเลือก</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop-up Notification -->
    <div class="popup" id="popup">
        <h2>ยืมสำเร็จแล้ว!</h2>
        <p>คุณได้ทำการยืมหนังสือเรียบร้อยแล้ว</p>
        <button onclick="closePopup()">ตกลง</button>
    </div>

    <!-- Bootstrap JS, jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        function setReturnDate() {
            const borrowDate = new Date(document.getElementById('date').value);
            const returnDate = new Date(borrowDate);
            returnDate.setDate(borrowDate.getDate() + 7); // เพิ่ม 7 วัน

            const returnDateInput = document.getElementById('return_date');
            returnDateInput.value = returnDate.toISOString().split('T')[0]; // ตั้งค่าวันที่คืน
        }
        // Set return date on page load based on the default borrow date
        window.onload = function() {
            setReturnDate();
        };

        // Show popup if success message is present
        @if (session('success'))
            document.getElementById('popup').style.display = 'block';
        @endif

        // Function to show popup
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
        }

        // Function to close popup
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }

        // Function to open member selection modal
        document.getElementById('memberSelectBtn').onclick = function() {
            $('#memberModal').modal('show');
        };

        // Function to select member
        function selectMember(id, name, code) {
            document.getElementById('selectedMember').innerText = `สมาชิก: ${name}`;
            document.getElementById('selectedMemberCode').innerText = `รหัสสมาชิก: ${code}`;
            document.getElementById('member_id').value = id;
            $('#memberModal').modal('hide');
        }

        // Function to filter members
        function filterMembers() {
            const searchValue = document.getElementById('memberSearch').value.toLowerCase();
            const members = document.querySelectorAll('.member-item');
            members.forEach(function(member) {
                const name = member.getAttribute('data-name').toLowerCase();
                const code = member.getAttribute('data-code').toLowerCase();
                if (name.includes(searchValue) || code.includes(searchValue)) {
                    member.style.display = 'block';
                } else {
                    member.style.display = 'none';
                }
            });
        }
    </script>

</body>

</html>