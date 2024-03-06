<?php 
include('../config/config.php');

if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
{
    echo 'something went wrong, please try again';
    exit;
}
else
{
    $account_sql="select * from account_details where user_id={$_SESSION['user_id']}";
    $account_result=mysqli_query($con, $account_sql);
    if(mysqli_num_rows($account_result)==1)
    {
        $row_account=mysqli_fetch_assoc($account_result);

        $sql="select id, available_points, redeemed_points from users where id={$_SESSION['user_id']}";
        $result=mysqli_query($con, $sql);
        if(mysqli_num_rows($result)==1)
        {
            $row=mysqli_fetch_assoc($result);
            if($row['available_points']>=50)
            {
                $updated_available_points=0;
                $updated_redeemed_points=$row['available_points']+$row['redeemed_points'];

                // $transaction_id='txn'
                $transaction_id= strtoupper('txn'.uniqid().'' . bin2hex(random_bytes(4)));

                $sql_transaction="insert into transactions (user_id, ammount, bank_name, account_number,ifsc_code, name, transaction_id) values({$_SESSION['user_id']}, {$row['available_points']}, '{$row_account['bank_name']}', '{$row_account['account_number']}', '{$row_account['ifsc_code']}', '{$row_account['name']}', '{$transaction_id}')";

                $result_transaction=mysqli_query($con, $sql_transaction);
                if($result_transaction)
                {
                    $sql_update_user="update users set available_points={$updated_available_points}, redeemed_points={$updated_redeemed_points}";
                    $result_update_user=mysqli_query($con, $sql_update_user);
                    if($result_update_user)
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
            else
            {
                echo 'You Don\'t have sufficient Points to Redeem';
            }
        }
        else
        {
            echo 'user does not exist';
        }
    }
    else
    {
        echo 'Bank Account Not Found, Please Add Bank Details';
    }
}


?>