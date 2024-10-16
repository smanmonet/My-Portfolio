<?php
class ReturnEquipmentController
{
    public function return()
    {
        $return_list = ReturnEquipment::getAll();
        require_once('views/return/return.php');
    }
    public static function newReturn()
    {
        $return_list = AddReturn::getAdd();
        require_once('views/return/newReturn.php');
    }
    public function addReturn()
    {
        $ID_borrow = $_GET['ID_borrow'];
        ReturnEquipment::Add($ID_borrow);
        ReturnEquipmentController::Return();
    }
    public function deleteConfirm()
    {
        $ID_return = $_GET['ID_return'];
        $return = ReturnEquipment::get($ID_return);
        require('views/return/deleteConfirm.php');
    }

    public function fine()
    {
        $ID_return = $_GET['ID_return'];
        $amount_return = $_GET['amount_return'];
        $Date_return = $_GET['Date_return'];

        // เรียกฟังก์ชัน fine()
        $fineData = Fine::fine($ID_return, $amount_return, $Date_return);

        // ส่งค่าปรับไปยังหน้า view
        require('views/return/returnFine.php');
    }
    public function delete()
    {
        $ID_return = $_GET['ID_return'];
        Fine::delete($ID_return);
        ReturnEquipmentController::return();
    }
    public function search()
    {
        $key = $_GET['key'];
        $return_list = ReturnEquipment::search($key);
        require('views/return/return.php');
    }
    
}
