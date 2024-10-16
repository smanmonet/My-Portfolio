<?php
class Equipment
{
    public $ID_equipment, $name_equipment, $staffID, $amount, $name_staff, $ID, $ID_staff;

    public function __construct($ID_equipment, $name_equipment, $staffID, $amount, $name_staff, $ID, $ID_staff)
    {
        $this->ID_equipment = $ID_equipment;
        $this->name_equipment = $name_equipment;
        $this->staffID = $staffID;
        $this->amount = $amount;
        $this->name_staff = $name_staff;
        $this->ID = $ID;
        $this->ID_staff = $ID_staff;
    }

    public static function getAll()
    {
        $equipmentList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM equipment 
                INNER JOIN staff ON staff.ID_staff = equipment.staffID 
                INNER JOIN position ON position.ID = staff.position_id 
                WHERE position.type = 'Loan_Return_Officer'
                ORDER BY ID_equipment ASC";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_equipment = $my_row['ID_equipment'];
            $name_equipment = $my_row['name_equipment'];
            $staffID = $my_row['staffID'];
            $amount = $my_row['amount'];
            $name_staff = $my_row['name_staff'];
            $ID = $my_row['ID'];
            $ID_staff = $my_row['ID_staff'];
            $equipmentList[] = new Equipment($ID_equipment, $name_equipment, $staffID, $amount, $name_staff, $ID, $ID_staff);
        }
        require("connection_close.php");

        return $equipmentList;
    }
    public static function show()
    {
        require("connection_connect.php");
        $sql = "SELECT equipment.ID_equipment, (equipment.amount - IFNULL(SUM(borrow.amount_borrow), 0)) AS remaining_amount
            FROM equipment 
            LEFT JOIN borrow ON borrow.equipment_ID = equipment.ID_equipment
            GROUP BY equipment.ID_equipment";
        $result = $conn->query($sql);
        $s_list = [];

        while ($my_row = $result->fetch_assoc()) {
            $s_list[$my_row['ID_equipment']] = $my_row['remaining_amount']; // จัดเก็บค่าคงเหลือตาม ID อุปกรณ์
        }

        require("connection_close.php");

        return $s_list; // คืนค่าเป็น array ที่มี ID อุปกรณ์เป็น key และจำนวนคงเหลือเป็น value
    }


    public static function Add($name_equipment, $staffID, $amount)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO equipment (name_equipment, staffID, amount) 
                VALUES ('$name_equipment', '$staffID', '$amount')";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";
    }

    public static function search($key)
    {
        $equipmentList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM equipment 
                INNER JOIN staff ON equipment.staffID = staff.ID_staff 
                INNER JOIN position ON position.ID = staff.position_id
                WHERE (equipment.name_equipment LIKE '%$key%' OR staff.name_staff LIKE '%$key%')";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_equipment = $my_row['ID_equipment'];
            $name_equipment = $my_row['name_equipment'];
            $staffID = $my_row['staffID'];
            $amount = $my_row['amount'];
            $name_staff = $my_row['name_staff'];
            $ID = $my_row['ID'];
            $ID_staff = $my_row['ID_staff'];
            $equipmentList[] = new Equipment($ID_equipment, $name_equipment, $staffID, $amount, $name_staff, $ID, $ID_staff);
        }
        require("connection_close.php");

        return $equipmentList;
    }

    public static function get($ID_equipment)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM equipment 
                INNER JOIN staff ON equipment.staffID = staff.ID_staff
                INNER JOIN position ON position.ID = staff.position_id
                WHERE equipment.ID_equipment = '$ID_equipment'";
        $result = $conn->query($sql);
        $my_row = $result->fetch_assoc();
        $ID_equipment = $my_row['ID_equipment'];
        $name_equipment = $my_row['name_equipment'];
        $staffID = $my_row['staffID'];
        $amount = $my_row['amount'];
        $name_staff = $my_row['name_staff'];
        $ID = $my_row['ID'];
        $ID_staff = $my_row['ID_staff'];
        require("connection_close.php");
        return new Equipment($ID_equipment, $name_equipment, $staffID, $amount, $name_staff, $ID, $ID_staff);
    }

    public static function update($ID_equipment, $equipment_ID, $staffID, $amount)
    {
        require("connection_connect.php");
        $sql = "UPDATE equipment SET name_equipment = '$equipment_ID', staffID = '$staffID', amount = '$amount'
                WHERE ID_equipment = '$ID_equipment'";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "update success $result rows";
    }

    public static function delete($ID_equipment)
    {
        require("connection_connect.php");
        $sql = "DELETE FROM equipment WHERE ID_equipment = '$ID_equipment'";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "delete success $result rows";
    }
}
