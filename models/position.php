<?php

class Position
{
    public $ID;
    public $type;

    public function __construct($ID, $type)
    {
        $this->ID= $ID;
        $this->type = $type;
    }

    public static function getAll()
    {
        $positionList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM position";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID = $my_row['ID'];
            $type = $my_row['type'];
            $positionList[] = new Position($ID,$type);
        }
        require("connection_close.php");

        return $positionList;
    }
}