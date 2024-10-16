<?php
echo "<br>Are you sure delete this Equipment?<br>";
?>
<table border="1" cellpadding="5" cellspacing="0">
    <br><tr>
        <th>ID</th>
        <th>Name</th>
        <th>Amount</th>
    </tr>
    <tr>
        <td><?php echo $equipment->ID_equipment; ?></td>
        <td><?php echo $equipment->name_equipment; ?></td>
        <td><?php echo $equipment->amount; ?></td>
    </tr>
</table>
<br>
<form method="get" action="">
    <input type="hidden" name="controller" value="equipment" />
    <input type="hidden" name="ID_equipment" value="<?php echo $equipment->ID_equipment ?>" />
    <button type="submit" name="action" value="equipment">Back</button>
    <button type="submit" name="action" value="delete">Delete</button>
</form>
