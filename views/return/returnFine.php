<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fine.css">
</head>
<body>
<table border="1" cellpadding="5" cellspacing="0" class="details-table">
    <tr>
        <th>ID</th>
        <th>Fine Amount</th>
        <th>Fine Date</th>
        <th>Total Fine</th>
    </tr>
    <tr>
        <td><?php echo $fineData['ID_return']; ?></td>
        <td><?php echo $fineData['fine_amount']; ?></td>
        <td><?php echo $fineData['fine_date']; ?></td>
        <td><?php echo $fineData['total_fine']; ?></td>
    </tr>
</table>

<div class="button-group" style="padding: 20px;">
    <button class="button-submit">
        <a href="?controller=returnEquipment&action=delete&ID_return=<?php echo $fineData['ID_return']; ?>">Submit</a>
    </button>
</div>

</body>
