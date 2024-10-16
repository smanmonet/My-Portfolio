<?php
class BorrowController
{
    public function borrow()
    {
        $borrow_list = Borrow::getAll();
        require_once('views/borrow/borrow.php');
    }
    public function newBorrow()
    {
        $equipment_list = Equipment::getAll();
        $staff_list = Staff::getAll();
        $member_list = Member::getAll();
        require_once('views/borrow/newBorrow.php');
    }

    public function addBorrow()
    {
        $equipment_ID = $_GET['equipment_ID'];
        $member_ID = $_GET['member_ID'];
        $amount = $_GET['amount'];
        $staff_id = $_GET['staffID'];
        $Date_borrow = $_GET['Date_borrow'];
        Borrow::add($equipment_ID, $member_ID, $amount, $staff_id, $Date_borrow);
        BorrowController::borrow();
    }
    public function search()
    {
        $key = $_GET['key'];
        $borrow_list = Borrow::search($key);
        require('views/borrow/borrow.php');
    }
    public function updateForm()
    {
        $ID_borrow = $_GET['ID_borrow'];
        $borrow = Borrow::get($ID_borrow); 
        $equipment_list = Equipment::getAll();
        $member_list = Member::getAll();
        $staff_list = Staff::getAll();
       
        require('views/borrow/updateForm.php');
    }
    public function update()
    {   
        $ID_borrow = $_GET['ID_borrow'];
        $equipment_ID = $_GET['equipment_ID'];
        $member_ID  = $_GET['member_ID'];
        $amount_borrow = $_GET['amount_borrow'];
        $staff_id = $_GET['staff_id'];
        $Date_borrow = $_GET['Date_borrow'];
        Borrow::update($ID_borrow, $equipment_ID,$member_ID , $amount_borrow, $staff_id,$Date_borrow);
        BorrowController::borrow();
    }
    public function deleteConfirm()
    {
        $ID_borrow = $_GET['ID_borrow'];
        $borrow = Borrow::get($ID_borrow);
        require('views/borrow/deleteConfirm.php');
    }
    public function delete()
    {
        $ID_borrow = $_GET['ID_borrow'];
        Borrow::delete($ID_borrow);
        BorrowController::borrow();
    }
}

