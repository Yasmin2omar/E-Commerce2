<?php

use App\Addresses;
use App\Customer;
use App\ErrorMessage;
use App\Order;
use App\OrderItems;

if (session_status() === PHP_SESSION_NONE) {
            session_start();
}
require_once __DIR__ ."/../Validator.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(!empty($_POST['order_total'])){
        if(empty($_POST['check_method'])){
        $_POST['check_method']="";
    }
    $type="billing & shipping";
    $rules=[
        "first_name"=>"required|min:3|max:20|string",
        "last_name"=>"required|min:3|max:20|string",
        "country"=>"required|string",
        "street_name1"=>"required|min:3|max:100|string",
        "city"=>"required|min:3|max:20|string",
        "state"=>"required|min:3|max:20|string",
        "email"=>"required|email",
        "phone"=>"required|numeric|min:11|max:15",
        "password"=>"required|max:50|min:8",
        "check_method" => "required",
        "company_name"=>"min:3|max:20|string",
        "street_name2"=>"string",
        "order_notes" => "string|max:255"
    ];
    if(isset($_POST['different'])){
        $type="shipping";
        $rules=array_merge($rules,[
            "first_name2"=>"required|min:3|max:20|string",
            "last_name2"=>"required|min:3|max:20|string",
            "country2"=>"required|string",
            "street_name1_2"=>"required|min:3|max:100|string",
            "city2"=>"required|min:3|max:20|string",
            "state2"=>"required|min:3|max:20|string",
            "email2"=>"required|email",
            "phone2"=>"required|numeric|min:11|max:15",
            "company_name2"=>"min:3|max:20|string",
            "street_name2_2"=>"string",
        ]);
    }

    $validator=new Validator($_POST);
    foreach($_POST as $field => $value){
        if(isset($rules[$field])){
            $validator->validate($value,$field,$rules[$field]);
        }
    }
    if($validator->hasErrors()){
        ErrorMessage::setMessege("danger",$validator->getErrors());
        header("location: index.php?page=check-out");
        exit;
    }
    if(isset($_POST['different'])){
        
        $customer=Customer::saveCustomer(
            $db,
            $_POST['first_name2'],
            $_POST['last_name2'],
            $_POST['company_name2'],
            $_POST['country2'],
            $_POST['city2'],
            $_POST['state2'],
            $_POST['email2'],
            $_POST['phone2'],
            $_POST['password'],
            $_POST['check_method'],
            $_POST['street_name1'],
            $_POST['street_name2']
        );
        $customer_id=$customer->getId();
        Addresses::saveAddress(
            $db,
            $customer_id,
            $_POST['street_name1_2'],
            $_POST['street_name2_2'],
            $_POST['city2'],
            $_POST['state2'],
            $_POST['country2'],
            $type);
            
        $order=Order::saveOrder(
            $db,
            $customer_id,
            $_POST['order_total'],
            $_POST['check_method'],
            $_POST['status'],
            $_POST['order_date'],
            $_POST['order_notes']);
            $order_id=$order->getId();
            foreach($_POST['product_id'] as$key=> $id){
                $quantity=$_POST['product_qty'][$key];
                $price=$_POST['product_price'][$key];
                $total_price=$_POST['item_price'][$key];
                OrderItems::saveOrderItems(
                $db,
                $order_id,
                $id,
                $quantity,
                $price,
                $total_price,
                $_POST['order_total']);
            };
    }else{
        
    $customer=Customer::saveCustomer(
        $db,
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['company_name'],
        $_POST['country'],
        $_POST['city'],
        $_POST['state'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['password'],
        $_POST['check_method'],
        $_POST['street_name1'],
        $_POST['street_name2']);
    $customer_id=$customer->getId();
    Addresses::saveAddress(
        $db,
        $customer_id,
        $_POST['street_name1'],
        $_POST['street_name2'],
        $_POST['city'],
        $_POST['state'],
        $_POST['country'],
        $type);
    $order=Order::saveOrder(
        $db,
        $customer_id,
        $_POST['order_total'],
        $_POST['check_method'],
        $_POST['status'],
        $_POST['order_date'],
        $_POST['order_notes']);
        $order_id=$order->getId();
         foreach($_POST['product_id'] as$key=> $id){
                $quantity=$_POST['product_qty'][$key];
                $price=$_POST['product_price'][$key];
                $total_price=$_POST['item_price'][$key];
                OrderItems::saveOrderItems(
                $db,
                $order_id,
                $id,
                $quantity,
                $price,
                $total_price,
                $_POST['order_total']);
            };
    }
    ErrorMessage::setMessege("success","Success! Your order was completed and will be shipped soon✅");
    header("location: index.php?page=check-out");
    exit; 
    }else{
        ErrorMessage::setMessege("danger","The Cart Is Empty!!!");
        header("location: index.php?page=check-out");
        exit;
    }
   
}