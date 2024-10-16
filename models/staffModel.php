<?php
class Staff
{
    public $ID_staff;
    public $name_staff;
    public $position_id;

    public function __construct($ID_staff, $name_staff, $position_id)
    {
        $this->ID_staff = $ID_staff;
        $this->name_staff = $name_staff;
        $this->position_id = $position_id;
    }

    public static function getAll()
    {
        $staffList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM staff INNER JOIN position ON position.ID = staff.position_id WHERE position.type = 'Loan_Return_Officer'";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_staff = $my_row['ID_staff'];
            $name_staff = $my_row['name_staff'];
            $position_id = $my_row['position_id'];
            $staffList[] = new Staff($ID_staff, $name_staff, $position_id);
        }
        require("connection_close.php");

        return $staffList;
    }
}
