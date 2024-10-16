<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/delete.css">
</head>
<body>
<form method="get" action="">
    <div class="form-group">
        <label>Amount Return</label>
        <input type="text" name="amount_return" class="input-text" /> 
    </div>
    <div class="form-group">
        <label>Date Return</label>
        <input type="date" name="Date_return" class="input-date" /> 
    </div>

    <table border="1" cellpadding="5" cellspacing="0" class="details-table">
        <tr>
            <th>ID</th>
            <th>Equipment</th>
            <th>Member</th>
            <th>Amount Borrow</th>
            <th>Date Borrow</th>
        </tr>
        <?php
        echo "<tr>
                <td>{$return->ID_return}</td>
                <td>{$return->name_equipment}</td>
                <td>{$return->name_member}</td>
                <td>{$return->amount_borrow}</td>
                <td>{$return->Date_borrow}</td>
            </tr>";
        ?>
    </table>

    <div class="button-group">
        <input type="hidden" name="controller" value="returnEquipment" />
        <input type="hidden" name="ID_return" value="<?php echo $return->ID_return ?>" />
        <button type="submit" name="action" value="return" class="button-back">Back</button>
        <button type="submit" name="action" value="fine" class="button-submit">Submit</button>
    </div>
</form>

</body>
