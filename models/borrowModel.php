<?php
class Borrow
{
    public $ID_borrow, $equipment_ID, $member_ID, $amount_borrow, $staff_id, $Date_borrow;
    public $name_staff, $name_equipment, $name_member;

    public function __construct($ID_borrow, $equipment_ID, $member_ID, $amount_borrow, $staff_id, $Date_borrow, $name_staff, $name_equipment, $name_member)
    {
        $this->ID_borrow = $ID_borrow;
        $this->equipment_ID = $equipment_ID;
        $this->member_ID = $member_ID;
        $this->amount_borrow = $amount_borrow;
        $this->staff_id = $staff_id;
        $this->Date_borrow = $Date_borrow;
        $this->name_staff = $name_staff;
        $this->name_equipment = $name_equipment;
        $this->name_member = $name_member;
    }

    public static function getAll()
    {
        $borrowList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM borrow INNER JOIN member ON member.ID_member = borrow.member_ID 
                                    INNER JOIN equipment ON equipment.ID_equipment = borrow.equipment_ID 
                                    INNER JOIN staff ON staff.ID_staff = borrow.staff_id
                                    ORDER BY ID_borrow ASC";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_borrow = $my_row['ID_borrow'];
            $equipment_ID = $my_row['equipment_ID'];
            $member_ID = $my_row['member_ID'];
            $amount_borrow = $my_row['amount_borrow'];
            $staff_id = $my_row['staff_id'];
            $Date_borrow = $my_row['Date_borrow'];
            $name_staff = $my_row['name_staff'];
            $name_equipment = $my_row['name_equipment'];
            $name_member = $my_row['name_member'];
            $borrowList[] = new Borrow(
                $ID_borrow,
                $equipment_ID,
                $member_ID,
                $amount_borrow,
                $staff_id,
                $Date_borrow,
                $name_staff,
                $name_equipment,
                $name_member
            );
        }
        require("connection_close.php");

        return $borrowList;
    }
    public static function Add($equipment_ID, $member_ID, $amount_borrow, $staff_id, $Date_borrow)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO borrow (equipment_ID, member_ID, amount_borrow, staff_id, Date_borrow) 
                VALUES ('$equipment_ID', '$member_ID', '$amount_borrow', '$staff_id', '$Date_borrow')";
        $result = $conn->query($sql);

        require("connection_close.php");
        return "add success $result rows";
    }

    public static function search($key)
    {
        $borrowList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM borrow 
            INNER JOIN member ON member.ID_member = borrow.member_ID 
            INNER JOIN equipment ON equipment.ID_equipment = borrow.equipment_ID 
            INNER JOIN staff ON staff.ID_staff = borrow.staff_id
            WHERE (member.name_member LIKE '%$key%' 
            OR equipment.name_equipment LIKE '%$key%' 
            OR staff.name_staff LIKE '%$key%')";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_borrow = $my_row['ID_borrow'];
            $equipment_ID = $my_row['equipment_ID'];
            $member_ID = $my_row['member_ID'];
            $amount_borrow = $my_row['amount_borrow'];
            $staff_id = $my_row['staff_id'];
            $Date_borrow = $my_row['Date_borrow'];
            $name_staff = $my_row['name_staff'];
            $name_equipment = $my_row['name_equipment'];
            $name_member = $my_row['name_member'];
            $borrowList[] = new Borrow($ID_borrow, $equipment_ID, $member_ID, $amount_borrow, $staff_id, $Date_borrow, $name_staff, $name_equipment, $name_member);
        }

        require("connection_close.php");

        return $borrowList;
    }
    public static function get($ID_borrow)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM borrow 
            INNER JOIN member ON member.ID_member = borrow.member_ID 
            INNER JOIN equipment ON equipment.ID_equipment = borrow.equipment_ID 
            INNER JOIN staff ON staff.ID_staff = borrow.staff_id
            WHERE borrow.ID_borrow = '$ID_borrow'";

        $result = $conn->query($sql);
        $my_row = $result->fetch_assoc();

        $ID_borrow = $my_row['ID_borrow'];
        $equipment_ID = $my_row['equipment_ID'];
        $member_ID = $my_row['member_ID'];
        $amount_borrow = $my_row['amount_borrow'];
        $staff_id = $my_row['staff_id'];
        $Date_borrow = $my_row['Date_borrow'];
        $name_staff = $my_row['name_staff'];
        $name_equipment = $my_row['name_equipment'];
        $name_member = $my_row['name_member'];

        require("connection_close.php");

        return new Borrow(
            $ID_borrow,
            $equipment_ID,
            $member_ID,
            $amount_borrow,
            $staff_id,
            $Date_borrow,
            $name_staff,
            $name_equipment,
            $name_member
        );
    }
    public static function update($ID_borrow, $equipment_ID, $member_ID, $amount_borrow, $staff_id, $Date_borrow)
    {
        require("connection_connect.php");
        $sql = "UPDATE borrow SET equipment_ID = '$equipment_ID', member_ID = '$member_ID', 
        amount_borrow = '$amount_borrow', staff_id = '$staff_id', Date_borrow = '$Date_borrow'
        WHERE ID_borrow = '$ID_borrow'";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "update success $result rows";
    }
    public static function delete($ID_borrow)
    {
        require("connection_connect.php");
        $sql = "DELETE FROM borrow WHERE ID_borrow = '$ID_borrow'";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "delete success $result rows";
    }
}
