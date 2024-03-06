<?php 
include('../config/config.php');

$sql="select * from account_details where user_id={$_SESSION['user_id']}";

$result=mysqli_query($con, $sql);

$output = '';

if(mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);
    $output .= '<p class="p">Bank Name: <b>'.strtoupper($row['bank_name']).'</b></p>';
    $output .= '<p class="p">A/C No.: <b>'.strtoupper($row['account_number']).'</b></p>';
    $output .= '<p class="p">IFSC Code: <b>'.strtoupper($row['ifsc_code']).'</b></p>';
    $output .= '<p class="p">Name: <b>'.ucwords(strtolower($row['name'])).'</b></p>';
    
    $output .= '<a href="#" class="edit-account-btn">Edit</a>';
}

else
{
    $output .='
    <div class="form-container">
        <div class="form-heading">
            <h1>Add Bank Account</h1>
        </div>
        <form action="" method="POST" id="add-account-form" class="form-area">
            <input type="text" name="bank-name" id="bank-name" placeholder="Bank Name">
            <input type="text" name="account-no" id="account-no" placeholder="A/C No.">
            <input type="text" name="confirm-account-no" id="confirm-account-no" placeholder="Confirm A/C No.">
            <input type="text" name="ifsc-code" id="ifsc-code" placeholder="IFSC Code">
            <input type="text" name="name" id="name" placeholder="Account Holder Name">
            <input type="submit" name="add-account-btn" id="add-account-btn" value="Submit">
        </form>
        <div class="message-container">
            <p class="msg-text"></p>
        </div>
    </div>';
}

echo $output;



?>