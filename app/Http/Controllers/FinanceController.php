<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Finance;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;


class FinanceController extends Controller
{
    //
    public function order(){
        //orders.orderID,orderproduct.Quantity,product.productID,product.price

        $orders = QueryBuilder::for(Finance::class)
        ->selectRaw("SUM( product.price *  orderproduct.Quantity )as totalPrice")
        ->selectRaw(" orders.date as dateone ")
        ->selectRaw("orders.status as status")
        ->selectRaw("member.Name as Name , member.Surname as Surname , member.Address as Address")
        ->selectRaw("orders.memberID")
         ->selectRaw("orders.image as image")
        ->selectRaw("orders.orderID")
        ->leftJoin('orderproduct','orders.orderID','=','orderproduct.orderID')
        ->leftJoin('product','orderproduct.productID','=','product.productID')
        ->leftJoin('member','orders.memberID','=','member.memberID')
        ->where('orders.status','=',"รอตรวจสอบ")
        ->groupBy('orders.orderID')
        //->sum('product.price * orderproduct.Quantity')
        ->get();


        $value = session()->get("id");
        //dd($value);
        $UserID = $value;
        //$UserID = 2;
        $role = QueryBuilder::for(Role::class)
            ->leftJoin('roletype','role.roletypeID','=','roletype.roletypeID')
            ->where('role.empID',$UserID)
            ->get();

        return view('finance',compact('role','orders'));
    }
    public function updateStatus(int $orderID){  //$userID ต้องเป็นuserID
        $value = session()->get("id");
        //dd($value);
        $UserID = $value;
       Finance::findOrFail($orderID)
       ->update([
        'status' => "สำเร็จ",
        'empID' => $UserID,
        //'empID' => $empID,
    ]);
      return back();
    
    }
}
