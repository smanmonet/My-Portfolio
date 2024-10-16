<?php
class Member
{
    public $ID_member,$name_member;
    public function __construct($ID_member,$name_member)
    {
        $this->ID_member = $ID_member;
        $this->name_member = $name_member;
    }

    public static function getAll()
    {
        $memberList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM member";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_member = $my_row['ID_member'];
            $name_member = $my_row['name_member'];
            $memberList[] = new Member($ID_member,$name_member);
        }
        require("connection_close.php");

        return $memberList;
    }
}