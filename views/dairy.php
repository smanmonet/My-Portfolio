<?php
session_start(); // เริ่มต้น session
// ตรวจสอบว่ามีผู้ใช้ล็อกอินอยู่หรือไม่
if (isset($_SESSION['user'])) {
    $usernames = $_SESSION['user'];
} else {
    $usernames = 'Guest'; // ถ้ายังไม่ได้ล็อกอินให้แสดง 'Guest'
}

// Database connection
$servername = "localhost";
$usernameDB = "root";
$password = "";
$dbname = "data_security";

// Create connection
$conn = new mysqli($servername, $usernameDB, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ฟังก์ชันสำหรับการแทรกข้อมูลลงในตาราง dairy
function insertDairy($conn, $user_id, $date, $topic, $detail, $key)
{
    $sql = "INSERT INTO dairy (user_id, date, topic, detail, `Key`) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $user_id, $date, $topic, $detail, $key);

    if ($stmt->execute()) {
        return true; // สำเร็จ
    } else {
        return false; // มีข้อผิดพลาด
    }
}

// ฟังก์ชันสำหรับการลบข้อมูลจากตาราง dairy
function deleteDairy($conn, $dairy_id)
{
    $sql = "DELETE FROM dairy WHERE id_dairy = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $dairy_id);

    if ($stmt->execute()) {
        return true; // ลบสำเร็จ
    } else {
        return false; // มีข้อผิดพลาด
    }
}

// ตรวจสอบการส่งข้อมูลการลบจากฟอร์ม
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    if (deleteDairy($conn, $delete_id)) {
        // ลบสำเร็จ เปลี่ยนเส้นทางกลับไปยังหน้าเดิม
        header("Location: ../views/dairy.php");
        exit();
    } else {
        echo "<p>Error: Unable to delete dairy entry.</p>";
    }
}


// ดึง user_id จากฐานข้อมูลตาม username
$user_id = null;
$sqlUser = "SELECT id_user FROM user WHERE username = ?";
$stmtUser = $conn->prepare($sqlUser);
$stmtUser->bind_param("s", $usernames);
$stmtUser->execute();
$resultUser = $stmtUser->get_result();
if ($resultUser->num_rows > 0) {
    $rowUser = $resultUser->fetch_assoc();
    $user_id = $rowUser['id_user'];
}

// ตรวจสอบการส่งข้อมูลจากฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['delete_id'])) {
    // รับค่าจากฟอร์ม
    $date = date('Y-m-d H:i:s'); // ใช้วันที่ปัจจุบัน
    $topic = $_POST['topic']; // รับค่าหัวข้อจากฟอร์ม (ที่เข้ารหัสแล้ว)
    $detail = $_POST['detail']; // รับรายละเอียดจากฟอร์ม (ที่เข้ารหัสแล้ว)
    $key = $_POST['keyword']; // รับค่าจากฟิลด์ keyword

    // ตรวจสอบข้อมูลที่ได้รับ


    // ตรวจสอบว่าข้อมูลไม่ว่างเปล่า
    if (!empty($topic) && !empty($detail) && !empty($key)) {
        if (insertDairy($conn, $user_id, $date, $topic, $detail, $key)) {
            // สำเร็จ
        } else {
            echo "Error: Unable to create dairy entry.";
        }
    }
}


// ตรวจสอบการค้นหาจาก GET
$search = $_GET['search'] ?? '';
$sql = "SELECT * FROM dairy INNER JOIN user ON user.id_user = dairy.user_id WHERE user.username = ?";

// ถ้ามีการค้นหาให้เพิ่มเงื่อนไข LIKE
if (!empty($search)) {
    $sql .= " AND dairy.topic LIKE ?";
    $searchTerm = "%" . $search . "%";
}

// เตรียมและรันคำสั่ง SQL
$stmt = $conn->prepare($sql);
if (!empty($search)) {
    $stmt->bind_param("ss", $usernames, $searchTerm);
} else {
    $stmt->bind_param("s", $usernames);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Diary</title>
    <link rel="stylesheet" href="../css/dairy.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script>
        // เพิ่มโค้ด JavaScript ที่ให้ไว้ที่นี่
        window.onload = function() {
            document.getElementById("saveForm").onsubmit = function(event) {
                const topic = document.getElementById('topic').value;
                const detail = document.getElementById('detail').value;
                const keyword = document.getElementById('keyword').value;

                // ตรวจสอบว่ามีค่าหรือไม่
                if (topic === "" || detail === "" || keyword === "") {
                    alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                    event.preventDefault(); // หยุดการส่งฟอร์มถ้าข้อมูลไม่ครบ
                    return;
                }

                // Vigenère cipher โดยใช้ keyword จากผู้ใช้
                const encodedTopicVigenere = vigenereCipher(topic, keyword);
                const encodedDetailVigenere = vigenereCipher(detail, keyword); // เข้ารหัส Detail

                // กำหนดค่าที่เข้ารหัสให้กับฟิลด์ที่เหมาะสม
                // document.getElementById('topic').value = encodedTopicVigenere;
                document.getElementById('detail').value = encodedDetailVigenere; // กำหนดค่าเข้ารหัสของ Detail

                alert("ข้อมูลได้รับการเข้ารหัสแล้ว");
            };


            // ฟังก์ชัน Vigenère Cipher
            function vigenereCipher(str, keyword) {
                let result = '';
                keyword = keyword.toUpperCase();
                const keywordLength = keyword.length;
                const textLength = str.length;

                for (let i = 0, j = 0; i < textLength; i++) {
                    const char = str[i];
                    if (char.match(/[a-zA-Z]/)) {
                        const shift = keyword[j % keywordLength].charCodeAt(0) - 65; // Shift based on key
                        j++;
                        if (char >= 'A' && char <= 'Z') {
                            result += String.fromCharCode((char.charCodeAt(0) + shift - 65) % 26 + 65);
                        } else {
                            result += String.fromCharCode((char.charCodeAt(0) + shift - 97) % 26 + 97);
                        }
                    } else {
                        result += char; // Non-alphabetic characters remain unchanged
                    }
                }
                return result;
            }

        };

        function confirmDelete() {
            return confirm("ConfirmDelete");
        }
    </script>
</head>

<body>
    <div class="headnav">
        <a href="../welcome.php">
            <h3 class="logo">Secret Diary</h3>
        </a>
        <div class="nav-links">
            <a href="#">My Diary</a>
            <a><?php echo htmlspecialchars($usernames); ?></a>
        </div>
    </div>

    <div class="container">
        <div class="head-container">
            <div class="dairy-add">
                <button id="addBtn" class="add-button">+</button>
            </div>
            <div class="search-bar">
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="search" value="<?php echo htmlspecialchars($search); ?>">
                    <a type="submit"></a>
                </form>
            </div>
        </div>

        <div class="dairy-list">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    
                    <div class="dairy-item">
                        <div>
                            <h4>
                                <a href="dairy_detail.php?id=<?php echo $row['id_dairy']; ?>">
                                    <?php echo htmlspecialchars($row['topic']); ?>
                                </a>
                            </h4>
                        </div>
                        <div class="dairy-item-date">
                            <span><?php echo htmlspecialchars($row['date']); ?></span>

                            <!-- ปุ่มลบ -->
                            <form method="POST" action="" style="display:inline;" onsubmit="return confirmDelete();">
                                <input type="hidden" name="delete_id" value="<?php echo $row['id_dairy']; ?>">
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No diary entries found.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>New Diary</h2>

            <form method="POST" action="" id="saveForm">
                <div class="input-group">
                    <label for="topic">Topic</label>
                    <input type="text" id="topic" name="topic" required>
                </div>
                <div class="input-group">
                    <label for="detail">Detail</label>
                    <textarea id="detail" name="detail" cols="30" rows="10" required></textarea>
                </div>
                <div class="input-group">
                    <label for="keyword">Key</label>
                    <input type="text" id="keyword" name="keyword" required>
                </div>

                <button type="submit" class="submit-button">Save</button>

            </form>
        </div>
    </div>

    <script src="../script.js"></script>
</body>

</html>

<?php
// Close the connection
$conn->close();
?>