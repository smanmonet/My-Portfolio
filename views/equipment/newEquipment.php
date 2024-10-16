<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add.css">
    <h1>New Equipment</h1>
</head>

<body>
    <form method="get" action="">
        <label>Name <input type="text" name="name_equipment" /> </label><br>
        <label>Staff <select name="staffID">
                <?php foreach ($staff_list as $staff) {
                        echo "<option value='$staff->ID_staff'>$staff->name_staff</option>";
                } ?>
            </select>
        </label>
        <label>Amount <input type="text" name="amount" /> </label><br>

        <input type="hidden" name="controller" value="equipment" />
        <button type="submit" name="action" value="equipment">Back</button>
        <button type="submit" name="action" value="addEquipment">Save</button>
    </form>
</body>

</html>