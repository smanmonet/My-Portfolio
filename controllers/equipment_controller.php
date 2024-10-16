<?php
class EquipmentController
{
    public function equipment()
    {   
        $equipment_list = Equipment::getAll();
        $s_list = Equipment::show(); // เรียกฟังก์ชัน show() เพื่อดึงจำนวนคงเหลือ
        require('views/equipment/equipment.php');
    }
    

    public function newEquipment()
    {
        $staff_list = Staff::getAll();
        require('views/equipment/newEquipment.php');
    }

    public function addEquipment()
    {   
        $name_equipment = $_GET['name_equipment'];
        $staffID = $_GET['staffID'];
        $amount = $_GET['amount'];
        Equipment::Add($name_equipment, $staffID, $amount);
        
        EquipmentController::equipment();
    }

    public function search()
    {
        $key = $_GET['key'];
        $equipment_list = Equipment::search($key);
        require('views/equipment/equipment.php');
    }

    public function updateForm()
    {
        $ID_equipment = $_GET['ID_equipment'];
        $equipment = Equipment::get($ID_equipment);
        $staff_list = Staff::getAll();
        require('views/equipment/updateForm.php');
    }
    
    public function update()
    {   
        
        $ID_equipment = $_GET['ID_equipment'];
        $name_equipment = $_GET['name_equipment'];
        $staffID = $_GET['staffID'];
        $amount = $_GET['amount'];
        Equipment::update($ID_equipment, $name_equipment, $staffID, $amount);
        EquipmentController::equipment();
    }

    public function deleteConfirm()
    {
        $ID_equipment = $_GET['ID_equipment'];
        $equipment = Equipment::get($ID_equipment);
        require('views/equipment/deleteConfirm.php');
    }

    public function delete()
    {
        $ID_equipment = $_GET['ID_equipment'];
        Equipment::delete($ID_equipment);
        EquipmentController::equipment();
    }
}
