<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'pages';
    $action = 'home';
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>FootBall System</title>
</head>

<body>
<?php echo "controller = $controller, action = $action<br>"; ?>
<div class="container">
    
    <nav>
        [<a href="?controller=pages&action=home">Home</a>]
        [<a href="?controller=equipment&action=equipment">Equipment</a>]
        [<a href="?controller=borrow&action=borrow">Borrow</a>]
        [<a href="?controller=returnEquipment&action=return">Return</a>]
    </nav>

</div>

    <?php require("routes.php"); ?>

</body>

</html>