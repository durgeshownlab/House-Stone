<?php 

$output = '
    <div class="form-container">
        <div class="form-heading">
            <h1>Change Password</h1>
        </div>
        <form action="" method="POST" id="change-password-form" class="form-area">
            <input type="text" name="current-password" id="current-password" placeholder="Current Password">
            <input type="text" name="new-password" id="new-password" placeholder="New Password">
            <input type="text" name="confirm-new-password" id="confirm-new-password" placeholder="Confirm New Password">
            <input type="submit" name="change-password-btn" id="change-password-btn" value="Change Password">
        </form>
        <div class="message-container">
            <p class="msg-text"></p>
        </div>
    </div>
';

echo $output;
?>