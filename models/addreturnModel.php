<?php
class AddReturn
{
    public $ID_borrow;
    public function __construct($ID_borrow)
    {
        $this->ID_borrow = $ID_borrow;
    }
    public static function getAdd()
    {
        $returnList = [];
        require("connection_connect.php");
        $sql = "SELECT borrow.ID_borrow FROM borrow 
                LEFT JOIN return_equipment ON borrow.ID_borrow = return_equipment.borrow_ID 
                WHERE return_equipment.borrow_ID IS NULL ORDER BY borrow.ID_borrow ASC";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_borrow = $my_row['ID_borrow'];
            $returnList[] = new AddReturn($ID_borrow);
        }
        require("connection_close.php");
        return $returnList;
    }
}
