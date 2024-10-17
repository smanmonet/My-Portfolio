<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css_page1.css">
    <title>SecretCipher</title>
    <style>
        .active {
            background-color: green;
            color: white;
        }
    </style>
</head>

<body>
    <div class="headnav">
         
        <a href="welcome.php">
              <h3 class="logo">Secret Diary</h3>
        </a>
        <div>        
             <a href="views/dairy.php">Diary</a>
             <a href="index.php">Logout</a>
        </div>

        
       
        
    </div>

    <div class="container">
        <h1>Secret Diary</h1>

        <?php
        // Ensure the controller is included
        require_once 'controllers/CipherController.php';
        $controller = new CipherController(); // This should not throw an error
        

        // Process the request
        $action = isset($_POST['action']) ? $_POST['action'] : 'encrypt';
        $cipherType = isset($_POST['cipherType']) ? $_POST['cipherType'] : 'caesar';
        $plaintext = isset($_POST['plaintext']) ? $_POST['plaintext'] : '';
        $shift = isset($_POST['shift']) ? $_POST['shift'] : '';
        $key = isset($_POST['key']) ? $_POST['key'] : '';
        $result = null; // Initialize result


        ?>

        <form method="post" action="">
            <input type="hidden" id="actionInput" name="action" value="<?php echo $action; ?>">

            <div class="tab">
                <button type="button" id="encryptBtn" class="<?php echo $action === 'encrypt' ? 'active' : ''; ?>" onclick="setAction('encrypt')">Encrypt</button>
                <button type="button" id="decryptBtn" class="<?php echo $action === 'decrypt' ? 'active' : ''; ?>" onclick="setAction('decrypt')">Decrypt</button>
            </div>

            <div class="input-group">
                <input type="text" name="plaintext" placeholder="Please enter a message." value="<?php echo htmlspecialchars($plaintext); ?>" required>
            </div>

            <div class="input-group">
                <label for="cipherType">Select encryption type:</label>
                <select name="cipherType" id="cipherType" onchange="toggleCipherOptions()">
                    <option value="caesar" <?php echo $cipherType === 'caesar' ? 'selected' : ''; ?>>Caesar Cipher</option>
                    <option value="vigenere" <?php echo $cipherType === 'vigenere' ? 'selected' : ''; ?>>Vigenère Cipher</option>
                    <option value="base64" <?php echo $cipherType === 'base64' ? 'selected' : ''; ?>>Base64</option>
                </select>
            </div>

            <div class="input-group" id="caesar-options" style="display: <?php echo $cipherType === 'caesar' ? 'block' : 'none'; ?>;">
                <input type="number" name="shift" placeholder="Number of shifts" value="<?php echo htmlspecialchars($shift); ?>">
            </div>

            <div class="input-group" id="vigenere-options" style="display: <?php echo $cipherType === 'vigenere' ? 'block' : 'none'; ?>;">
                <input type="text" name="key" placeholder="Please enter key." value="<?php echo htmlspecialchars($key); ?>">
            </div>

            <div class="button-group">
                <button type="submit">submit</button>
            </div>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = $controller->handleRequest(); // Call the handleRequest method
        }

        if ($result) {
            echo "<h3>result:</h3>";
            echo "<h3 id='resultText'> $result</h3>";
            echo "<button onclick='copyResult()'>copy</button>";
        }
        ?>
    </div>


    <script src="script.js"></script>

</body>

</html>