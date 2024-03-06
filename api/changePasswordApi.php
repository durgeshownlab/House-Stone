<?php

include('../config/config.php');

if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
{
    echo 'User Not Loged in';
    exit;
}
else if(!isset($_POST['current_password']) || empty($_POST['current_password']))
{
    echo 'current password is Empty';
    exit;
}
else if(!isset($_POST['new_password']) || empty($_POST['new_password']))
{
    echo 'new password is Empty';
    exit;
}
else if(!isset($_POST['confirm_new_password']) || empty($_POST['confirm_new_password']))
{
    echo 'confirm new password is Empty';
    exit;
}
else if($_POST['confirm_new_password'] != $_POST['confirm_new_password'])
{
    echo 'new password and confirmm new password is not same';
    exit;
}

else
{
    $current_password=mysqli_real_escape_string($con, $_POST['current_password']);
    $new_password=mysqli_real_escape_string($con, $_POST['new_password']);

    $sql="select * from users where email='{$_SESSION['email']}' and password='{$current_password}'";
    if(mysqli_num_rows(mysqli_query($con, $sql))==1)
    {
        $sql="update users set password='{$new_password}' where id={$_SESSION['user_id']} and email='{$_SESSION['email']}' and password='{$current_password}'";
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
        echo 'Please Enter Correct Password!';
    }

}

?>