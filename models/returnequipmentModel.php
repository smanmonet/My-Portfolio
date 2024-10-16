<?php
class ReturnEquipment
{
    public $ID_return;
    public $name_equipment, $name_member, $amount_borrow, $name_staff, $Date_borrow;
    public $s;

    public function __construct($ID_return, $name_equipment, $name_member, $amount_borrow, $name_staff, $Date_borrow)
    {
        $this->ID_return = $ID_return;
        $this->name_equipment = $name_equipment;
        $this->name_member = $name_member;
        $this->amount_borrow = $amount_borrow;
        $this->name_staff = $name_staff;
        $this->Date_borrow = $Date_borrow;
    }

    public static function getAll()
    {
        $returnList = [];
        require("connection_connect.php");
        $sql = "SELECT ID_return ,name_equipment,name_member,amount_borrow,name_staff,Date_borrow 
        FROM return_equipment INNER JOIN borrow ON borrow.ID_borrow = return_equipment.borrow_ID 
        INNER JOIN equipment on equipment.ID_equipment = borrow.equipment_ID
        INNER JOIN member ON member.ID_member = borrow.member_ID 
        INNER JOIN staff ON staff.ID_staff = borrow.staff_id
        ORDER BY ID_return ASC";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_return = $my_row['ID_return'];
            $name_equipment = $my_row['name_equipment'];
            $name_member = $my_row['name_member'];
            $amount_borrow = $my_row['amount_borrow'];
            $name_staff = $my_row['name_staff'];
            $Date_borrow = $my_row['Date_borrow'];
            $returnList[] = new ReturnEquipment($ID_return, $name_equipment, $name_member, $amount_borrow, $name_staff, $Date_borrow);
        }
        require("connection_close.php");

        return $returnList;
    }
    public static function Add($ID_borrow)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO return_equipment (borrow_ID) 
                VALUES ('$ID_borrow')";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";
    }
    public static function get($ID_return)
    {
        require("connection_connect.php");
        $sql = "SELECT ID_return, name_equipment, name_member, amount_borrow, name_staff, Date_borrow
            FROM return_equipment 
            INNER JOIN borrow ON borrow.ID_borrow = return_equipment.borrow_ID
            INNER JOIN equipment ON equipment.ID_equipment = borrow.equipment_ID
            INNER JOIN member ON member.ID_member = borrow.member_ID
            INNER JOIN staff ON staff.ID_staff = borrow.staff_id
            WHERE return_equipment.ID_return = '$ID_return'";
        $result = $conn->query($sql);
        $my_row = $result->fetch_assoc();
        $ID_return = $my_row['ID_return'];
        $name_equipment = $my_row['name_equipment'];
        $name_member = $my_row['name_member'];
        $amount_borrow = $my_row['amount_borrow'];
        $name_staff = $my_row['name_staff'];
        $Date_borrow = $my_row['Date_borrow'];
        require("connection_close.php");
        return new ReturnEquipment($ID_return, $name_equipment, $name_member, $amount_borrow, $name_staff, $Date_borrow);
    }
    public static function search($key)
    {
        $returnList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM return_equipment 
                INNER JOIN borrow ON borrow.ID_borrow = return_equipment.borrow_ID
                INNER JOIN equipment ON equipment.ID_equipment = borrow.equipment_ID 
                INNER JOIN member ON member.ID_member = borrow.member_ID
                INNER JOIN staff ON staff.ID_staff = borrow.staff_id
                WHERE (member.name_member LIKE '%$key%' OR equipment.name_equipment LIKE '%$key%' OR staff.name_staff LIKE '%$key%')";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_return = $my_row['ID_return'];
            $name_equipment = $my_row['name_equipment'];
            $name_member = $my_row['name_member'];
            $amount_borrow = $my_row['amount_borrow'];
            $name_staff = $my_row['name_staff'];
            $Date_borrow = $my_row['Date_borrow'];
            $returnList[] = new ReturnEquipment($ID_return, $name_equipment, $name_member, $amount_borrow, $name_staff, $Date_borrow);
        }

        require("connection_close.php");

        return $returnList;
    }
}
