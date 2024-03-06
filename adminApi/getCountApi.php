<?php

include('../config/config.php');

$response = array();

// for total users 
$sql="select count(id) as total_users from users";
$result=mysqli_query($con, $sql);
if(mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);

    $response[]=array(
        'field_name'=>'total_users',
        'count'=>$row['total_users']
    );
}

// for today users 
$sql="select count(id) as today_users from users where DATE(timestamp)=CURDATE()";
$result=mysqli_query($con, $sql);
if(mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);

    $response[]=array(
        'field_name'=>'today_users',
        'count'=>$row['today_users']
    );
}

// for payment settled
$sql="select count(id) as payment_settled from transactions where status='success'";
$result=mysqli_query($con, $sql);
if(mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);

    $response[]=array(
        'field_name'=>'payment_settled',
        'count'=>$row['payment_settled']
    );
}

// for transaction request
$sql="select count(id) as transaction_request from transactions where DATE(timestamp)=CURDATE()";
$result=mysqli_query($con, $sql);
if(mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);

    $response[]=array(
        'field_name'=>'transaction_request',
        'count'=>$row['transaction_request']
    );
}

// for expired coupon code
$sql="select count(id) as expired_coupon from coupons where is_used=true";
$result=mysqli_query($con, $sql);
if(mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);

    $response[]=array(
        'field_name'=>'expired_coupon',
        'count'=>$row['expired_coupon']
    );
}

// for available coupon code
$sql="select count(id) as available_coupon from coupons where is_used=false";
$result=mysqli_query($con, $sql);
if(mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);

    $response[]=array(
        'field_name'=>'available_coupon',
        'count'=>$row['available_coupon']
    );
}



echo json_encode($response);

?>