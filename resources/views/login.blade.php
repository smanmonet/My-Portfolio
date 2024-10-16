<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #e0f7e0; /* สีพื้นหลังทั้งหมด */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* ให้ฟอร์มอยู่กลางหน้าจอ */
        }

        .login-container {
            background-color: white; /* สีพื้นหลังของฟอร์ม */
            border-radius: 10px; /* มุมมน */
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* เงา */
            width: 300px; /* ขนาดของฟอร์ม */
        }

        h2 {
            text-align: center;
            color: #2e7d32; /* สีเขียว */
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333; /* สีตัวอักษร */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px; /* มุมมน */
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50; /* สีเขียว */
            color: white; /* สีตัวอักษร */
            border: none;
            border-radius: 5px; /* มุมมน */
            cursor: pointer; /* แสดงว่าเป็นปุ่ม */
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049; /* สีเขียวเข้มเมื่อ hover */
        }

        .error-messages {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>เข้าสู่ระบบ</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="user_name">User Name:</label>
            <input type="text" name="user_name" required>
            
            <label for="password">Password:</label>
            <input type="number" name="password" required>
            
            <button type="submit">Login</button>
        </form>

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>
