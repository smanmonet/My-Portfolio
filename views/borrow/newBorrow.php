<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add.css">
    <h1>New Borrow</h1>
</head>

<body>
    <form method="get" action="">
        <label>Equipment 
            <select name="equipment_ID">
                <?php foreach ($equipment_list as $equipment) {
                        echo "<option value='$equipment->ID_equipment'>$equipment->name_equipment</option>";
                } ?>
            </select>
        </label><br>

        <label>Member 
            <select name="member_ID">
                <?php foreach ($member_list as $member) {
                        echo "<option value='{$member->ID_member}'>{$member->name_member}</option>";
                } ?>
            </select>
        </label><br>

        <label>Amount 
            <input type="text" name="amount"/></label><br>
        <label>Staff 
            <select name="staffID">
                <?php foreach ($staff_list as $staff) {
                        echo "<option value='{$staff->ID_staff}'>{$staff->name_staff}</option>";
                } ?>
            </select>
        </label><br>
        
        <label>Date <input type="date" name="Date_borrow" /> </label><br>

        <input type="hidden" name="controller" value="borrow" />
        <button type="submit" name="action" value="borrow">Back</button>
        <button type="submit" name="action" value="addBorrow">Save</button>
    </form>
</body>

</html>
