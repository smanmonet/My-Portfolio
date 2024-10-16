<!DOCTYPE html>
<html lang="th">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

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
            font-size: 32px; /* ขนาดลดลงเล็กน้อย */
            font-weight: bold; /* เพิ่มความหนาของตัวหนังสือ */
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
            font-weight: bold; /* เพิ่มความหนาของตัวหนังสือ */
        }

        .book-details {
            display: flex;
            justify-content: center; /* ใช้ justify-content เพื่อจัดกลาง */
            padding: 20px;
        }

        .book-image {
            max-width: 300px;
            max-height: 300px;
            object-fit: cover;
        }

        .details {
            max-width: 400px;
            margin-left: 20px; /* เพิ่มระยะห่างระหว่างภาพและรายละเอียด */
        }

        .warning-text {
            color: red; /* ปรับสีข้อความแจ้งเตือน */
        }
        .member-item {
        cursor: pointer; /* เพิ่มเคอร์เซอร์เป็นรูปมือเมื่อชี้ไปที่สมาชิก */
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
    @if($book->type === 'book')
        <div class="book-details">
            <div>
                <img src="../image/book/{{ $book->ID}}.jpg" alt="{{ $book->book_name }}" class="book-image">
            </div>
            <div class="details">
                <h2>รายละเอียดของหนังสือ</h2>
                <p>ชื่อหนังสือ: {{ $book->book_name }}</p>
                <p>รายละเอียดเพิ่มเติม: {{ $book->description }}</p>
                <p>จำนวนหนังสือทั้งหมด: {{ $book->max }}</p>
                <p>จำนวนหนังสือที่พร้อมให้ยืม: {{ $availableBooks }}</p>
            
                <div class="container">
                    @if($availableBooks > 0)
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#borrowModal">ยืม</button>
                    @else
                        <button type="button" class="btn btn-warning" disabled>ไม่สามารถยืมได้</button>
                        <p class="warning-text">ไม่มีหนังสือพร้อมให้ยืมในขณะนี้</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal for Borrow Book -->
        <div class="modal fade" id="borrowModal" tabindex="-1" role="dialog" aria-labelledby="borrowModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="borrowModalLabel">ยืนยันการยืมหนังสือ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="selectedMember">เลือกผู้ยืม:</label>
                        <button type="button" class="btn btn-primary" id="memberSelectBtn">เลือกสมาชิก</button>
                        
                        <p id="selectedMemberCode" style="margin-top: 10px;">รหัสสมาชิก: ยังไม่เลือก</p> <!-- New line for member code -->
                        <p id="selectedMember" data-id="" style="margin-top: 10px;">สมาชิก: ยังไม่เลือก</p>
                        <p>ท่านต้องการยืมหนังสือ <strong>{{ $book->book_name }}</strong></p>
                        <p>กำหนดคืนไม่เกินวันที่: <span id="deadline"></span></p>
                        <p class="warning-text">หากคืนหลังจากวันที่กำหนด จะมีค่าปรับวันละ 10 บาท</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn btn-primary" id="confirmBorrow">ยืนยันการยืม</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Member Selection -->
        <!-- Modal for Member Selection -->
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

        <!-- Modal for Error Message -->
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">การยืมหนังสือ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="errorMessage"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            ไม่พบหนังสือที่ท่านค้นหา
        </div>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const borrowDate = new Date();
            const deadlineDate = new Date(borrowDate);
            deadlineDate.setDate(borrowDate.getDate() + 7);
            document.getElementById('deadline').textContent = deadlineDate.toISOString().split('T')[0];

            document.getElementById('memberSelectBtn').addEventListener('click', function() {
                $('#memberModal').modal('show');
            });

            window.selectMember = function(memberId, memberName, memberCode) {
    document.getElementById('selectedMember').textContent = `สมาชิก: ${memberName}`;
    document.getElementById('selectedMember').setAttribute('data-id', memberId);
    document.getElementById('selectedMemberCode').textContent = `รหัสสมาชิก: ${memberCode}`; // Set the member code
    $('#memberModal').modal('hide');
}

            window.filterMembers = function() {
    const searchInput = document.getElementById('memberSearch').value.toLowerCase();
    const members = document.querySelectorAll('.member-item');
    
    members.forEach(member => {
        const memberName = member.getAttribute('data-name').toLowerCase();
        const memberCode = member.getAttribute('data-code').toLowerCase();
        
        // ค้นหาจากชื่อและรหัสสมาชิก
        if (memberName.includes(searchInput) || memberCode.includes(searchInput)) {
            member.style.display = 'block';
        } else {
            member.style.display = 'none';
        }
    });
}


            document.getElementById('confirmBorrow').addEventListener('click', function() {
                const memberId = document.getElementById('selectedMember').getAttribute('data-id');
                if (!memberId) {
                    alert('กรุณาเลือกสมาชิกก่อนยืนยันการยืม!');
                    return;
                }

                const bookId = {{ $book->ID }};
                
                fetch('{{ route("borrows.check") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        member_id: memberId,
                        book_id: bookId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetch('{{ route("borrows.store") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                member_id: memberId,
                                book_id: bookId,
                                date_borrow: borrowDate.toISOString().split('T')[0],
                                deadline: deadlineDate.toISOString().split('T')[0]
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok ' + response.statusText);
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                console.log("ยืมหนังสือสำเร็จ:", data);
                                $('#borrowModal').modal('hide');
                                location.reload();
                            } else {
                                console.error("เกิดข้อผิดพลาด:", data);
                            }
                        })
                        .catch(error => {
                            console.error("เกิดข้อผิดพลาดในการส่งข้อมูล:", error);
                        });
                    } else {
                        document.getElementById('errorMessage').textContent = data.message;
                        $('#errorModal').modal('show');
                    }
                })
                .catch(error => {
                    console.error("เกิดข้อผิดพลาดในการตรวจสอบข้อมูล:", error);
                });
            });

            $('#borrowModal').on('hidden.bs.modal', function () {
                document.getElementById('selectedMember').textContent = 'สมาชิก: ยังไม่เลือก'; // ล้างชื่อสมาชิก
                document.getElementById('selectedMember').setAttribute('data-id', '');
            });
        });
        $('#memberModal').on('hidden.bs.modal', function () {
    // ล้างชื่อสมาชิกและ ID ของสมาชิก หากไม่มีการเลือกสมาชิก
    if (!document.getElementById('selectedMember').getAttribute('data-id')) {
        document.getElementById('selectedMember').textContent = 'สมาชิก: ยังไม่เลือก'; // ล้างชื่อสมาชิก
        document.getElementById('selectedMember').setAttribute('data-id', '');
    }
    document.getElementById('memberSearch').value = ''; // รีเซ็ตข้อความค้นหา
    filterMembers(); // เรียกใช้ฟังก์ชันเพื่อแสดงสมาชิกทั้งหมด
});

    </script>
    
</body>
</html>
