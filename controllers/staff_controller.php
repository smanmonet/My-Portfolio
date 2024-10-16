<?php
class StaffController
{
    public function staff(){

            $staff_list = Staff::getAll();
            require('views/equipment/equipment.php');
        
    }
}