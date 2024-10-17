<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>

</head>

<body>



    <form method="POST" action="">            

        <div class="login-container">


            <h1>Secret Diary</h1>



            <input type="text" name="username" id="username" placeholder="Username" required>

            <input type="password" name="password" id="password" placeholder="Password" required>

            <button type="submit">Login</button>



            <a href="register.php">Don't have an account ? Sign up </a>






            <?php if (!empty($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>





        </div>
    </form>
</body>

</html>