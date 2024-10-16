<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/views.css">
    <title>ReturnEquipment</title>
</head>

<body>
    <div class="container">
        <h1>ReturnEquipment</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Equipment</th>
                <th>Member</th>
                <th>Amount Borrow</th>
                <th>Staff</th>
                <th>Date Borrow</th>
                <th>Return</th>
            </tr>
            <form method="get" action="">
                <input type="text" name="key">
                <input type="hidden" name="controller" value="returnEquipment" />
                <button type="submit" name="action" value="search">Search</button><br>
            </form>

            <?php
    foreach ($return_list as $return) {
        echo "<tr>
            <td>{$return->ID_return}</td>
            <td>{$return->name_equipment}</td>
            <td>{$return->name_member}</td>
            <td>{$return->amount_borrow}</td>
            <td>{$return->name_staff}</td>
            <td>{$return->Date_borrow}</td>
            <td>
                <a href=?controller=returnEquipment&action=deleteConfirm&ID_return={$return->ID_return}>Return</a>
            </td>
        </tr>";
    }
?>

        </table>
        <br>New Return [<a href="?controller=returnEquipment&action=newReturn"> Click </a>]
    </div>
</body>

</html>
