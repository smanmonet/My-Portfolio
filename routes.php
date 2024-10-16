<?php
$controllers = array(
'pages'     => ['home', 'error'],
'equipment' => ['equipment','newEquipment','addEquipment','search', 'updateForm', 'update', 'deleteConfirm', 'delete'],
'borrow'    => ['borrow'   ,'newBorrow'   ,'addBorrow'   ,'search', 'updateForm', 'update', 'deleteConfirm', 'delete'],
'returnEquipment'=> ['return','newReturn' ,'addReturn'   ,'search', 'deleteConfirm', 'fine','delete']
);

function call($controller, $action)
{
    require_once("controllers/" . $controller . "_controller.php");
    switch ($controller)
    {
        case "pages":
            $controller_obj = new PagesController();
            break;

        case "equipment":
            require("models/equipmentModel.php");
            require("models/staffModel.php");
            $controller_obj = new EquipmentController();
            break;
        
        case "borrow":
            require("models/borrowModel.php");
            require("models/equipmentModel.php");
            require("models/memberModel.php");
            require("models/staffModel.php");
            $controller_obj = new BorrowController();
            break;

        case "returnEquipment":
            require("models/returnequipmentModel.php");
            require("models/memberModel.php");
            require("models/borrowModel.php");
            require("models/equipmentModel.php");
            require("models/staffModel.php");
            require("models/addreturnModel.php");
            require("models/fineModel.php");
            $controller_obj = new ReturnEquipmentController();
            break;
    }

    // เรียกเมธอดในคอนโทรลเลอร์
    $controller_obj->{$action}();
}

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action); 
    } else {
        call('pages', 'error'); 
    }
} else {
    call('pages', 'error'); 
}
