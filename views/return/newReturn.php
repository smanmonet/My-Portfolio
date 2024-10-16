<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add.css">
    <h1>New Return</h1>
</head>

<body>
    <form method="get" action="">
        <label>ID_borrow 
            <select name="ID_borrow">
                <?php foreach ($return_list as $return) {
                        echo "<option value='$return->ID_borrow'>$return->ID_borrow</option>";
                } ?>
            </select>
        </label><br>

        <input type="hidden" name="controller" value="returnEquipment" />
        <button type="submit" name="action" value="return">Back</button>
        <button type="submit" name="action" value="addReturn">Submit</button>
    </form>
</body>

</html>
