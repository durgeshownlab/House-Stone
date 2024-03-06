<?php 
include('../config/config.php');

if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
{
    echo 'something went wrong, please try again';
    exit;
}
if(!isset($_POST['coupon_code']) || empty($_POST['coupon_code']) || strlen($_POST['coupon_code'])!=10)
{
    echo 'Coupon code is not correct, please try again';
    exit;
}
else
{
    $coupon_code=mysqli_real_escape_string($con, $_POST['coupon_code']);

    $sql="select * from coupons where coupon_code='{$coupon_code}'";

    $result=mysqli_query($con, $sql);


    if(mysqli_num_rows($result)==1)
    {
        $row=mysqli_fetch_assoc($result);

        if(!$row['is_used'])
        {
            $sql_existing_points="select id, available_points, redeemed_points from users where id={$_SESSION['user_id']}";
            $result_existing_points=mysqli_query($con, $sql_existing_points);
            if(mysqli_num_rows($result_existing_points)==1)
            {
                $row_existing_points=mysqli_fetch_assoc($result_existing_points);
                $updated_available_points=$row_existing_points['available_points']+$row['ammount'];
    
                $sql_for_user="update users set available_points={$updated_available_points} where id={$_SESSION['user_id']}";
    
                if(mysqli_query($con, $sql_for_user))
                {
                    $sql_update_coupon="update coupons set is_used=1 where coupon_code='{$coupon_code}'";
                    if(mysqli_query($con, $sql_update_coupon))
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
                    echo 0;
                }
            }
        }
        else
        {
            echo 2;
        }
    }
    else
    {
        echo 2;
    }
}


?>