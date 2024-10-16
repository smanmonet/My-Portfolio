<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/views.css">
    <title>Equipment</title>
</head>

<body>
    <div class="container">
        <h1>Equipment</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Staff</th>
                <th>Amount</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <form method="get" action="">
                <input type="text" name="key">
                <input type="hidden" name="controller" value="equipment" />
                <button type="submit" name="action" value="search">Search</button><br>
            </form>

            <?php
foreach ($equipment_list as $equipment) {
    // ดึงจำนวนคงเหลือจาก $s_list โดยใช้ ID ของอุปกรณ์
    $remaining = isset($s_list[$equipment->ID_equipment]) ? $s_list[$equipment->ID_equipment] : 'N/A';

    echo "<tr>
        <td>{$equipment->ID_equipment}</td>
        <td>{$equipment->name_equipment}</td>
        <td>{$equipment->name_staff}</td>
        <td>{$remaining}</td> <!-- แสดงจำนวนคงเหลือ -->
        <td>
            <a href=?controller=equipment&action=updateForm&ID_equipment={$equipment->ID_equipment}>Update</a>
        </td>
        <td>
            <a href=?controller=equipment&action=deleteConfirm&ID_equipment={$equipment->ID_equipment}>Delete</a>
        </td>
    </tr>";
}
?>

        </table>
        <br>New Equipment [<a href="?controller=equipment&action=newEquipment"> Click </a>]
    </div>
</body>

</html>
