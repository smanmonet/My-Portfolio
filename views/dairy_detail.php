<?php
session_start(); // เริ่มต้น session

// ตรวจสอบว่ามีผู้ใช้ล็อกอินอยู่หรือไม่
if (isset($_SESSION['user'])) {
    $usernames = $_SESSION['user'];
} else {
    $usernames = 'Guest'; // ถ้ายังไม่ได้ล็อกอินให้แสดง 'Guest'
} ?>

<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_security";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the dairy ID from the URL
$id_dairy = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_dairy > 0) {
    $sql = "SELECT * FROM dairy WHERE id_dairy = $id_dairy";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $conn->error;
        exit;
    } elseif ($result->num_rows > 0) {
        $dairy = $result->fetch_assoc();
    } else {
        echo "<p>No details found for this dairy entry.</p>";
        exit;
    }
} else {
    echo "<p>Invalid dairy ID.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dairy Detail</title>
    <link rel="stylesheet" href="../css/dairy.css">
</head>

<body>
    <div class="headnav">
        <a href="../welcome.php">
            <h3 class="logo">Secret Diary</h3>
        </a>
        <div class="nav-links">

            <?php echo htmlspecialchars($usernames); ?>Dairy
        </div>
    </div>
    <div class="container-dairy-detail">
        <a href="dairy.php">Back</a>

        <h2><?php echo htmlspecialchars($dairy['topic']); ?></h2>
        <p id="dairyDetail"><?php echo nl2br(htmlspecialchars($dairy['detail'])); ?></p>

        <div class="diary_footer">
            <h5>
                <?php echo htmlspecialchars($dairy['date']); ?>
            </h5>
            <div class="group">
                <button onclick="copyToClipboard()">Copy</button>
                <a href="../welcome.php"><button>Decrypt</button></a>
            </div>

        </div>







    </div>
    <script>
        function copyToClipboard() {
            // สร้าง element ชั่วคราวเพื่อเก็บข้อมูล
            var tempInput = document.createElement("textarea");
            tempInput.value = document.getElementById("dairyDetail").innerText;
            document.body.appendChild(tempInput);

            // เลือกข้อความและคัดลอกไปยัง clipboard
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // สำหรับ mobile
            document.execCommand("copy");

            // ลบ element ชั่วคราว
            document.body.removeChild(tempInput);

            // แจ้งผู้ใช้ว่าคัดลอกเรียบร้อย
            alert("Copied ");
        }
    </script>
</body>

</html>

<?php
$conn->close();
?>