<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/views.css">
    <title>Borrow</title>
</head>

<body>
    <div class="container">
        <h1>Borrow</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Equipment</th>
                <th>Member</th>
                <th>Amount</th>
                <th>Staff</th>
                <th>Date</th>
                <th>Update</th>
            </tr>
            <form method="get" action="">
                <input type="text" name="key">
                <input type="hidden" name="controller" value="borrow" />
                <button type="submit" name="action" value="search">Search</button><br>
            </form>

            <?php
    foreach ($borrow_list as $borrow) {
        echo "<tr>
            <td>{$borrow->ID_borrow}</td>
            <td>{$borrow->name_equipment}</td>
            <td>{$borrow->name_member}</td>
            <td>{$borrow->amount_borrow}</td>
            <td>{$borrow->name_staff}</td>
            <td>{$borrow->Date_borrow}</td>
            <td>
                <a href=?controller=borrow&action=updateForm&ID_borrow={$borrow->ID_borrow}>Update</a>
            </td>
        </tr>";
    }
?>

        </table>
        <br>New Borrow [<a href="?controller=borrow&action=newBorrow"> Click </a>]
    </div>
</body>

</html>
