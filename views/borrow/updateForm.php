<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add.css">
    <h1>Update Borrow</h1>
</head>

<body>

    <form method="get" action="">
        <label>ID <input name="ID_borrow" value="<?php echo $borrow->ID_borrow; ?>" /></label><br>

        <label>Equipment
            <select name="equipment_ID">
                <?php foreach ($equipment_list as $equipment) {
                    $selected = ($equipment->ID_equipment == $borrow->equipment_ID) ? "selected" : "";
                    echo "<option value='{$equipment->ID_equipment}' $selected>{$equipment->name_equipment}</option>";
                } ?>
            </select>
        </label><br>


        <label>Member
            <select name="member_ID">
                <?php foreach ($member_list as $member) {
                    $selected = ($member->ID_member == $borrow->member_ID) ? "selected" : "";
                    echo "<option value='{$member->ID_member}' $selected>{$member->name_member}</option>";
                } ?>
            </select>
        </label><br>


        <label>Amount <input type="text" name="amount_borrow" value="<?php echo $borrow->amount_borrow; ?>" /> </label><br>

        <label>Staff
            <select name="staff_id">
                <?php foreach ($staff_list as $staff) {
                    $selected = ($staff->ID_staff == $borrow->staff_id) ? "selected" : "";
                    echo "<option value='{$staff->ID_staff}' $selected>{$staff->name_staff}</option>";
                } ?>
            </select>
        </label><br>

        <label>Date <input type="date" name="Date_borrow" value="<?php echo $borrow->Date_borrow; ?>" /> </label><br>

        <input type="hidden" name="controller" value="borrow" />
        <button type="submit" name="action" value="borrow">Back</button>
        <button type="submit" name="action" value="update">Update</button>
    </form>

</body>

</html>