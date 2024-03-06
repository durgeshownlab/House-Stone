<?php 

include('../config/config.php');

$sql="select * from account_details where user_id={$_SESSION['user_id']}";
$result=mysqli_query($con, $sql);

if(mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);
}

$output = '
    <div class="form-container">
        <div class="form-heading">
            <h1>Upadte Bank Account</h1>
        </div>
        <form action="" method="POST" id="edit-account-form" class="form-area">
            <input type="text" name="bank-name" id="bank-name" placeholder="Bank Name" value="'.$row['bank_name'].'">
            <input type="text" name="account-no" id="account-no" placeholder="A/C No." value="'.$row['account_number'].'">
            <input type="text" name="confirm-account-no" id="confirm-account-no" placeholder="Confirm A/C No.">
            <input type="text" name="ifsc-code" id="ifsc-code" placeholder="IFSC Code" value="'.$row['ifsc_code'].'">
            <input type="text" name="name" id="name" placeholder="Account Holder Name" value="'.$row['name'].'">
            <input type="submit" name="edit-account-btn" id="edit-account-btn" value="Update Details">
        </form>
        <div class="message-container">
            <p class="msg-text"></p>
        </div>
    </div>
';

echo $output;
?>