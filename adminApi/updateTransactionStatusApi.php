<?php

include('../config/config.php');

if(!isset($_POST['transaction_id']) || empty($_POST['transaction_id']))
{
    echo 'Something Went Wrong, Please Refresh The Page';
    exit;
}
else
{
    date_default_timezone_set('Asia/Calcutta');
    $transaction_id=mysqli_real_escape_string($con, $_POST['transaction_id']);
    $u_time=date("Y-m-d H:i:s");
    $sql="update transactions set status='success', updated_timestamp='{$u_time}' where transaction_id='{$transaction_id}'";
    if(mysqli_query($con, $sql))
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
}


?>