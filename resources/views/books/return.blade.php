<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คืน สมุด</title>
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

        .return-list {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            display: none; /* ซ่อนตารางเริ่มต้น */
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .member-list {
            max-height: 300px;
            overflow-y: auto;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
        }

        .member-item {
            padding: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .member-item:hover {
            background-color: #e0e0e0;
        }

        #memberSearch {
            width: 100%; /* ทำให้ช่องค้นหามีความกว้าง 100% ของ container */
            padding: 10px; /* เพิ่ม padding เพื่อความสวยงาม */
            border: 1px solid #ddd; /* เพิ่ม border */
            border-radius: 5px; /* เพิ่มความโค้งมน */
        }

        .warning-message {
            color: red;
            font-size: 12px; /* ขนาดตัวอักษรเล็ก */
            margin-top: 10px; /* ระยะห่างด้านบน */
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
    <div class="container">
        <div class="return-list">
            <button id="memberSelectBtn">เลือกสมาชิก</button>
            <span id="selectedMember"></span>

            <div id="memberModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeMemberModal()">&times;</span>
                    <h2>เลือกสมาชิก</h2>
                    <input type="text" id="memberSearch" placeholder="ค้นหาชื่อสมาชิกหรือรหัสสมาชิก..." onkeyup="filterMembers()">
                    <div class="warning-message">*คลิกที่ชื่อที่ต้องการเพื่อเลือก</div>
                    <div class="member-list" id="memberList">
                        @foreach ($members as $member)
    <div class="member-item" 
         data-name="{{ $member->name }}" 
         data-member-code="{{ $member->member_code }}" 
         onclick="selectMember('{{ $member->id }}', '{{ $member->name }}')">
        {{ $member->member_code }} {{ $member->name }}
    </div>
@endforeach

                    </div>
                </div>
            </div>
            <br></br>
            <label for="typeSelect">เลือกประเภท:</label>
            <select id="typeSelect" required>
                <option value="">-- กรุณาเลือกประเภท --</option>
                <option value="book">หนังสือ</option>
                <option value="equipment">อุปกรณ์</option>
            </select>
            <div class="warning-message" id="warningMessage">กรุณาเลือกสมาชิกและประเภทเพื่อแสดงตารางการคืนของ</div>

            <table id="bookList">
                <thead>
                    <tr>
                        <th>ชื่อ</th>
                        <th>วันที่กำหนดคืน</th>
                        <th>ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- รายการหนังสือจะถูกแสดงที่นี่ -->
                </tbody>
            </table>
        </div>
    </div>

    <div id="returnModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeReturnModal()">&times;</span>
            <p id="modalMessage"></p>
            <p id="penaltyMessage"></p>
            <button id="confirmReturnBtn">ยืนยันการคืน</button>
        </div>
    </div>

    <script>
        let selectedMemberId;
        let currentBorrowId;

        document.getElementById('memberSelectBtn').addEventListener('click', function() {
            document.getElementById('memberModal').style.display = 'block';
        });

        function closeMemberModal() {
    document.getElementById('memberModal').style.display = 'none';
    document.getElementById('memberSearch').value = ''; // รีเซ็ตข้อความในช่องค้นหา
}



        function selectMember(memberId, memberName) {
    selectedMemberId = memberId;
    const memberCode = event.currentTarget.getAttribute('data-member-code'); // ดึงรหัสสมาชิกจาก attribute
    document.getElementById('selectedMember').innerHTML = `สมาชิก: ${memberName} รหัส: ${memberCode}`; // แสดงชื่อสมาชิกและรหัส
    closeMemberModal();
    fetchBooks(); // เรียก fetchBooks เมื่อเปลี่ยนสมาชิก
}


        function closeReturnModal() {
            document.getElementById('returnModal').style.display = 'none';
        }

        function openReturnModal(borrowId, bookName, deadline) {
            currentBorrowId = borrowId;
            const currentDeadline = new Date(deadline);
            const today = new Date();
            const timeDiff = today - currentDeadline;
            const daysLate = Math.max(0, Math.ceil(timeDiff / (1000 * 3600 * 24)) - 1);

            let penaltyMessage = '';
            if (daysLate > 0) {
                const penalty = daysLate * 10;
                penaltyMessage = `คืนหนังสือล่าช้า ${daysLate} วัน ค่าปรับ ${penalty} บาท`;
            }

            document.getElementById('modalMessage').textContent = `คุณต้องการคืนหนังสือ "${bookName}" ใช่หรือไม่?`;
            document.getElementById('penaltyMessage').textContent = penaltyMessage;
            document.getElementById('returnModal').style.display = 'block';
        }

        function filterMembers() {
    const searchInput = document.getElementById('memberSearch').value.toLowerCase();
    const members = document.querySelectorAll('.member-item');
    
    members.forEach(member => {
        const memberName = member.getAttribute('data-name').toLowerCase();
        const memberCode = member.getAttribute('data-member-code').toLowerCase();
        
        // ตรวจสอบว่าชื่อหรือรหัสสมาชิกตรงกับข้อความค้นหาหรือไม่
        if (memberName.includes(searchInput) || memberCode.includes(searchInput)) {
            member.style.display = 'block';
        } else {
            member.style.display = 'none';
        }
    });
}


        document.getElementById('typeSelect').addEventListener('change', fetchBooks);

        function fetchBooks() {
            const type = document.getElementById('typeSelect').value;
            const bookListTable = document.getElementById('bookList');
            const bookListBody = document.querySelector('#bookList tbody');
            bookListBody.innerHTML = ''; // ล้างข้อมูลเดิม

            // ตรวจสอบว่าเลือกสมาชิกและประเภทหรือไม่
            if (!selectedMemberId || !type) {
                bookListTable.style.display = 'none'; // ซ่อนตาราง
                return; // ไม่ต้องทำอะไรเพิ่มเติม
            }

            fetch(`/borrows/member/${selectedMemberId}/returns?type=${type}`)
                .then(response => response.json())
                .then(data => {
                    bookListTable.style.display = 'table'; // แสดงตาราง
                    if (data.length > 0) {
                        data.forEach(returnItem => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${returnItem.book_name}</td>
                                <td>${returnItem.deadline}</td>
                                <td>
                                    <button type="button" onclick="openReturnModal('${returnItem.borrow_id}', '${returnItem.book_name}', '${returnItem.deadline}')">คืน</button>
                                </td>
                            `;
                            bookListBody.appendChild(row);
                        });
                    } else {
                        const noItemsMessage = type === 'book' ? 'ไม่มีหนังสือที่ยังไม่ได้คืน' : 'ไม่มีอุปกรณ์ที่ยังไม่ได้คืน';
                        bookListBody.innerHTML = `<tr><td colspan="3">${noItemsMessage}</td></tr>`;
                    }
                })
                .catch(error => {
                    console.error('เกิดข้อผิดพลาด:', error);
                });
        }

        document.getElementById('confirmReturnBtn').addEventListener('click', function() {
            fetch('/confirm-return', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // สำหรับป้องกัน CSRF
                },
                body: JSON.stringify({ borrow_id: currentBorrowId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('การคืนสำเร็จ');
                    closeReturnModal();
                    fetchBooks(); // อัปเดตรายการหลังจากคืน
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาด:', error);
            });
        });

        window.onclick = function(event) {
            const memberModal = document.getElementById('memberModal');
            const returnModal = document.getElementById('returnModal');
            if (event.target === memberModal) {
                closeMemberModal();
            }
            if (event.target === returnModal) {
                closeReturnModal();
            }
        }
    </script>
</body>
</html>