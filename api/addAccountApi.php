<?php

include('../config/config.php');

if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
{
    echo 'User Not Loged in';
    exit;
}
else if(!isset($_POST['bank_name']) || empty($_POST['bank_name']))
{
    echo 'Bank Name is Empty';
    exit;
}
else if(!isset($_POST['account_no']) || empty($_POST['account_no']))
{
    echo 'A/C No. is Empty';
    exit;
}
else if(!isset($_POST['confirm_account_no']) || empty($_POST['confirm_account_no']))
{
    echo 'Confirm A/C No. is Empty';
    exit;
}
else if($_POST['confirm_account_no']!=$_POST['account_no'])
{
    echo 'A/C and Confirm A/C No. Must  Be The Same';
    exit;
}
else if(!isset($_POST['ifsc_code']) || empty($_POST['ifsc_code']))
{
    echo 'IFSC Code is Empty';
    exit;
}
else if($_POST['name'] != $_POST['name'])
{
    echo 'Account Holder Name is Empty';
    exit;
}

else
{
    $bank_name=mysqli_real_escape_string($con, $_POST['bank_name']);
    $account_no=mysqli_real_escape_string($con, $_POST['account_no']);
    $confirm_account_no=mysqli_real_escape_string($con, $_POST['confirm_account_no']);
    $ifsc_code=mysqli_real_escape_string($con, $_POST['ifsc_code']);
    $name=mysqli_real_escape_string($con, $_POST['name']);

    $sql="select * from account_details where user_id='{$_SESSION['user_id']}'";
    if(mysqli_num_rows(mysqli_query($con, $sql))==0)
    {
        $sql="insert into account_details (user_id, bank_name, account_number, ifsc_code, name) values({$_SESSION['user_id']}, '{$bank_name}', '{$account_no}', '{$ifsc_code}', '{$name}')";
        
        $result=mysqli_query($con, $sql);
        if($result)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    else
    {
        echo 'Something went wrong Please refresh the page 1';
    }

}

?>