<?php

include('../config/config.php');

if(!isset($_POST['no_of_coupons']) || empty($_POST['no_of_coupons']) || !is_numeric($_POST['no_of_coupons']))
{
    echo "Wrong No of Coupons Recived";
    exit;
}
else if(!isset($_POST['ammount']) || empty($_POST['ammount']) || !is_numeric($_POST['ammount']))
{
    echo "Wrong Ammount Value Recived";
    exit;
}
else
{
    $status=true;
    $no_of_coupons=$_POST['no_of_coupons'];
    $ammount=$_POST['ammount'];
    for($i=0; $i<$no_of_coupons; $i++)
    {
        $randomValue = strtoupper(substr(md5(uniqid(mt_rand(), true) . microtime()), 0, 10));
        
        // echo strtoupper($randomValue);
        $sql="insert into coupons (coupon_code, ammount) values('{$randomValue}', {$ammount})";
        if(!mysqli_query($con, $sql))
        {
            $status=false;
        }
    }

    if($status)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
}


?>