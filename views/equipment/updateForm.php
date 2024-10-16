<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add.css">
    <h1>Update Equipment</h1>
</head>

<body>

    <form method="get" action="">
        <label>ID <input name="ID_equipment" value="<?php echo $equipment->ID_equipment; ?>" /></label><br>
        <label>Name <input type="text" name="name_equipment" value="<?php echo $equipment->name_equipment; ?>" /> </label><br>

        <label>Staff 
            <select name="staffID">
                <?php foreach ($staff_list as $staff) {
                    $selected = ($staff->ID_staff == $equipment->staffID) ? "selected" : "";
                    echo "<option value='{$staff->ID_staff}' $selected>{$staff->name_staff}</option>";
                } ?>
            </select>
        </label><br>

        <label>Amount <input type="text" name="amount" value="<?php echo $equipment->amount; ?>" /> </label><br>

        <input type="hidden" name="controller" value="equipment" />
        <button type="submit" name="action" value="equipment">Back</button>
        <button type="submit" name="action" value="update">Update</button>
    </form>
</body>

</html>