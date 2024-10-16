<?php
class Fine
{
    public $ID_return, $amount_return, $Date_return;
    public function __construct($ID_return, $amount_return, $Date_return)
    {
        $this->ID_return = $ID_return;
        $this->amount_return = $amount_return;
        $this->Date_return = $Date_return;
    }
    public static function fine($ID_return, $amount_return, $Date_return)
    {
        require("connection_connect.php");

        $sql = "SELECT re.ID_return, 
            CASE WHEN br.amount_borrow != '$amount_return' 
                THEN ABS(br.amount_borrow - '$amount_return') * 100 ELSE 0 END AS fine_amount, 
            CASE WHEN br.Date_borrow != '$Date_return' 
                THEN DATEDIFF('$Date_return', br.Date_borrow) * 200 ELSE 0 END AS fine_date, 
            (CASE WHEN br.amount_borrow != '$amount_return' 
                THEN ABS(br.amount_borrow - '$amount_return') * 100 ELSE 0 END 
            + CASE WHEN br.Date_borrow != '$Date_return' 
                THEN DATEDIFF('$Date_return', br.Date_borrow) * 200 ELSE 0 END) AS total_fine 
            FROM borrow AS br 
            INNER JOIN return_equipment AS re ON br.ID_borrow = re.borrow_ID 
            WHERE re.ID_return = '$ID_return'";

        $result = $conn->query($sql);

        $fineData = [];

        if ($my_row = $result->fetch_assoc()) {
            $fineData['ID_return'] = $my_row['ID_return'];
            $fineData['fine_amount'] = $my_row['fine_amount'];
            $fineData['fine_date'] = $my_row['fine_date'];
            $fineData['total_fine'] = $my_row['total_fine'];
        }

        require("connection_close.php");

        return $fineData;  // คืนค่าปรับเป็น array
    }
    public static function delete($ID_return)
    {
        require("connection_connect.php");
        
        $sql = "SELECT borrow_ID INTO @borrow_id FROM return_equipment WHERE ID_return = '$ID_return';
                DELETE FROM return_equipment WHERE ID_return = '$ID_return';
                DELETE FROM borrow WHERE ID_borrow = @borrow_id";
    
        if ($conn->multi_query($sql)) {
            do {
                /* ตรวจสอบและเก็บผลลัพธ์ของคำสั่ง SQL */
                if ($result = $conn->store_result()) {
                    $result->free();
                }
            } while ($conn->more_results() && $conn->next_result()); // ตรวจสอบว่ามีผลลัพธ์ถัดไปหรือไม่
            $message = "Delete success";
        } else {
            $message = "Error: ";
        }
    
        require("connection_close.php");
    
        return $message;
    }
    
}
