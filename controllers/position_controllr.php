<?php
class PositionController
{
    public function position()
    {
        $position_list = Position::getAll();
        require('views/equipment/equipment.php');
    }
}