<?php
include('header.php');

if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')
{
    echo '<script>location.href = "admin.php";</script>';
}
else if(!isset($_SESSION['user_id']))
{
    echo '<script>location.href = "index.php";</script>';
}

?>



<div class="gutter" style="padding-top: 113px;"></div>

<style>

    .profile-container
    {
        width: 100%;
        height: auto;
        min-height: 100vh;
        /* border: 2px solid red; */
        display: flex;
        justify-content: center;
        /* align-items: center; */
        position: relative;
    }
    .profile-container::before
    {
        content: '';
        width: 100%;
        height: 30%;
        position: absolute;
        background-color: #45359e50;

    }

    .profile-card 
    {
        width: 80%;
        height: max-content;
        border: 1px solid #45359e50;
        z-index: 2;
        margin-top: 100px;
        background-color: #ffffff50;
        /* background-color: transparent; */
        position: relative;
        backdrop-filter: blur(5px);
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 75px;
        margin-bottom: 100px;
    }
    .profile-card::before
    {
        content: '';
        width: 100px;
        height: 100px;
        position: absolute;
        top: -50px;
        left: calc(50% - 50px);
        /* border: 2px solid #45359e90; */
        border-radius: 50%;
        background-image: url(assets/images/user.png);
        background-size: cover;

    }

    /* code  for points   */
    .both-points-container
    {
        width: 100%;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .points-container
    {
        width: max-content;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        background-color: #fff;
        padding: 20px 50px;
        align-self: first baseline;
        border: 1px solid #45359e;
    }

    .points-container p
    {
        text-wrap: nowrap;
    }
    

    .points
    {
        color: green;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .withdraw-btn
    {
        width: auto;
        height: 40px;
        font-size: 15px;
        border: 2px solid transparent;
        background-color: #45359e;
        color: #fff;
        cursor: pointer;
        padding: 0 20px 0 20px;
    }
    

    .points i
    {
        color: #f3c20a;
        font-size: 1.5rem;
    }

    .user-name 
    {
        font-family: Geologica;
        font-size: 25px;
        font-weight: 500;
        padding-bottom: 10px;
        margin-top: 20px;
    }

    .user-email
    {
        font-family: Geologica;
        font-size: 14px;
        font-weight: 300;
    }

    /* code for redeem card section  */
    .redeem-card-container
    {
        width: 50%;
        height: auto;
        background-color: #45359e50;
        margin-top: 20px;
        padding: 20px;
        border-radius: 5px;
    }

    .redeem-card-title 
    {
        width: 100%;
        height: auto;
    }

    .redeem-card-title h1
    {
        width: max-content;
        font-size: 16px;
        font-weight: 600;
        color: #fff;
        background-color: #45359e;
        padding: 5px 10px;
    }

    .redeem-card-body
    {
        width: 100%;
        height: auto;
        /* background-color: #45359e; */
        margin-top: 30px;
        display: flex;
        justify-content: center;
    }

    .redeem-card-body input[type=text]
    {
        width: 50%;
        height: 40px;
        outline: none;
        border: none;
        font-size: 20px;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        letter-spacing: 5px;
        text-transform: uppercase;
        padding: 0 10px;
    }

    .redeem-card-body input[type=text]::placeholder
    {
        font-size: 20px;
        letter-spacing: 1px;
        text-transform: capitalize;
    }

    .redeem-card-body input[type=submit]
    {
        width: auto;
        height: 40px;
        font-size: 15px;
        border: 2px solid transparent;
        background-color: #45359e;
        color: #fff;
        cursor: pointer;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        padding: 0 20px 0 20px;
    }

    .redeem-card-body input[type=submit]:hover
    {
        border: 2px solid #45359e;
        background-color: #ffffff;
        color: #45359e;
        cursor: pointer;
    }

    .logout-btn
    {
        height: auto;
        border: 1px solid #45359e;
        background-color: #45359e;
        color: #fff;
        padding: 10px 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        align-self: flex-end;
        margin-top: 40px;
        text-decoration: none;
        font-size: 20px;
    }
    .logout-btn:hover
    {
        background-color: #fff;
        color: #45359e;
    }

    /* code for accounts and history */
    .account-history-container
    {
        width: 100%;
        height: max-content;
        /* border: 2px solid red; */
        margin-top: 20px;
    }

    .account-history-tab-container
    {
        width: 100%;
        height:max-content;
        /* border: 1px solid blue; */
        display: flex;
        box-shadow: 0px 1px 24px -11px #000;
    }

    .account-history-tab-container ul
    {
        list-style: none;
        display: flex;
        /* column-gap: 10px; */
        flex-wrap: wrap;
    }

    .profile-tab
    {
        padding: 10px 20px;
        background-color: #fff;
        cursor: pointer;
        color: #45359e;
        user-select: none;
        text-wrap: nowrap;
    }

    .profile-tab:hover
    {
        padding: 10px 20px;
        background-color: #45359e;
        cursor: pointer;
        color: #fff;
        user-select: none;
    }

    .account-history-details-container
    {
        padding: 20px 10px;
    }
    
    .active 
    {
        padding: 10px 20px;
        background-color: #45359e;
        cursor: pointer;
        color: #fff;
        user-select: none;
    }

    /* code for account details */
    .p{
        padding: 10px 0;
    }

    .edit-account-btn
    {
        width: max-content;
        height: auto;
        border: 1px solid #45359e;
        background-color: #45359e;
        color: #fff;
        padding: 10px 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 40px;
        text-decoration: none;
        font-size: 20px;
    }
    .edit-account-btn:hover
    {
        background-color: #fff;
        color: #45359e;
    }

    .nothing-poster
    {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .nothing-poster img
    {
        height: 300px;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        object-fit: cover;
    }

    /* code for table-container */

    .table-container
    {
        width: 100%;
        height: auto;
        /* border: 2px solid red; */
        overflow: auto;
    }

    
    .table-container table, td, th
    {
        border: 1px solid #45359e80;
        border-collapse: collapse;
    }

    .table-container table tr td, th
    {
        padding: 10px;
        text-wrap: nowrap;
    }
    .status-success
    {
        color: green;
    }
    .status-pending
    {
        color: #ff8400;
    }

    .payment-heading
    {
        color: #45359e;
        text-align: left;
    }

    /* code for change password form  */
    .form-container
    {
        width: 100%;
        height: auto;
        /* border: 1px solid red; */
    }

    .form-heading h1
    {
        font-size: 1.4rem;
        font-weight: 600;
    }

    .form-area
    {
        margin-top: 10px;
        display: flex;
        flex-direction: column;
    }

    .form-area input
    {
        border: 1px solid #45359e50;
        margin-bottom: 10px;
        padding: 10px;
        font-size: 1rem;
        box-shadow: 0 0 20px #00000030;

    }
    .form-area input[type=submit]
    {
        border: 1px solid #45359e50;
        margin-bottom: 10px;
        padding: 10px;
        font-size: 1rem;
        background-color: #45359e;
        color: #fff;   
        cursor: pointer;     
    }

    .message-container
    {
        width: 100%;
        height: auto;
        margin-top: 10px;
    }

    .disabled-btn 
    {
        background-color: #828282 !important;
        pointer-events: none;
    }

    .form-response-msg
    {
        height: 25px;
        margin-top: 20px;
        text-align: center;
    }


    /* code for responsive design in tablet or simiar devices */

    @media only screen and (max-width: 900px)
    {
        .redeem-card-container 
        {
            width: 90% !important;
        }
    }

    /* code for responsive design in mobile or simiar devices */

    @media only screen and (max-width: 600px)
    {
        .profile-card {
            width: 95% !important;
        }

        .both-points-container {
            flex-direction: column-reverse !important;
            gap: 10px !important;
        }

        .points-container {
            width: 100% !important;
        }

        .redeem-card-container 
        {
            width: 95% !important;
        }

        .redeem-card-body {
            flex-direction: column !important;
            gap: 10px !important;
        }

        .redeem-card-body input[type=text] {
            width: 100% !important;
            font-size: 16px !important;
            border-radius: 5px !important;
        }

        .redeem-card-body input[type=submit] {
            width: 100% !important;
            font-size: 16px !important;
            border-radius: 5px !important;
        }

        .account-history-tab-container ul {
            width: 100% !important;
        }

        .profile-tab {
            width: 100% !important;
        }
    }


</style>

<div class="profile-container">
    <div class="profile-card">
        <div class="both-points-container">
            <div class="points-container">
                <p>Available Coins</p>
                <span class="points available-points"><i class='bx bxs-coin' ></i><?= $_SESSION['available_points'] ?></span>
                <button class="withdraw-btn" id="withdraw-btn-id">Withdraw</button>
            </div>
            <div class="points-container">
                <p>Redeemed Coins</p>
                <span class="points redeemed-points"><i class='bx bxs-coin' ></i><?= $_SESSION['redeemed_points'] ?></span>
            </div>

        </div>

        <h1 class="user-name"><?= $_SESSION['name'] ?></h1>
        <p class="user-email"><?= $_SESSION['email'] ?></p>

        <div class="redeem-card-container">
            <div class="redeem-card-title">
                <h1>Redeem Coupon</h1>
            </div>
            <div class="redeem-card-body">
                <input type="text" name="coupon-code" id="coupon-code" placeholder="Enter Coupon Code" minlength="10" maxlength="10">
                <input type="submit" name="coupon-code-submit" id="coupon-code-submit" value="Redeem" class="coupon-code-submit-btn disabled-btn" disabled>
            </div>
            <p class="form-response-msg"></p>
        </div>

        <a href="logout.php" class="logout-btn">Logout</a>

        <div class="account-history-container">
            <div class="account-history-tab-container">
                <ul>
                    <li class="profile-tab active" data-tab-name="account">Account Details</li>
                    <li class="profile-tab" data-tab-name="payment">Payment History</li>
                    <li class="profile-tab" data-tab-name="password">Change Password</li>   
                </ul>
            </div>
            <div class="account-history-details-container">
                home
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>