<?php
echo "<br>Are you sure delete this Borrow?<br>";
?>
<table border="1" cellpadding="5" cellspacing="0">
    <br>
    <tr>
        <th>ID</th>
        <th>Equipment</th>
        <th>Member</th>
        <th>Amount</th>
        <th>Staff</th>
        <th>Date</th>
    </tr>
    <tr>
        <td><?php echo $borrow->ID_borrow; ?></td>
        <td><?php echo $borrow->name_equipment; ?></td>
        <td><?php echo $borrow->name_member; ?></td>
        <td><?php echo $borrow->amount_borrow; ?></td>
        <td><?php echo $borrow->staff_id; ?></td>
        <td><?php echo $borrow->Date_borrow; ?></td>
    </tr>
</table>
<br>
<form method="get" action="">
    <input type="hidden" name="controller" value="borrow" />
    <input type="hidden" name="ID_borrow" value="<?php echo $borrow->ID_borrow ?>" />
    <button type="submit" name="action" value="borrow">Back</button>
    <button type="submit" name="action" value="delete">Delete</button>
</form>