<?php

include('config/config.php');

if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')
{
    echo '<script>location.href = "admin.php";</script>';
}
else if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && ($_SESSION['user_type']=='dealer' || $_SESSION['user_type']=='customer'))
{
    echo '<script>location.href = "index.php";</script>';
}


if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login-submit']))
{
    $email=mysqli_real_escape_string($con, $_POST['email']);
    $password=mysqli_real_escape_string($con, $_POST['password']);

    
    if($email==='')
    {
        echo 'email is empty';
        exit;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo 'email is wrong';
        exit;
    }
    else if($password==='')
    {
        echo 'password is empty';
        exit;
    }
    else
    {
        $sql1="select id, name, mobile, email, user_type, available_points, redeemed_points from users where email='{$email}' and password='{$password}'";
        $result1=mysqli_query($con, $sql1);

        if(mysqli_num_rows($result1)==1)
        {
            $row=mysqli_fetch_assoc($result1);
            $_SESSION['user_id']=$row['id'];
            $_SESSION['name']=$row['name'];
            $_SESSION['mobile']=$row['mobile'];
            $_SESSION['email']=$row['email'];
            $_SESSION['user_type']=$row['user_type'];
            $_SESSION['available_points']=$row['available_points'];
            $_SESSION['redeemed_points']=$row['redeemed_points'];

            echo '<script>location.href = "index.php";</script>';
        }
        else
        {
            echo '<script>alert("User doesn\'t Exists!");</script>';
        }
    }

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Latte Stone</title>
    
    <!-- google fonts cdn -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container
    {
        width: 100%;
        min-height: 100vh;
        max-width: auto;
        /* border: 2px solid red; */
        display: grid;
        place-items: center;
    }

    .login-card-container
    {
        width: 350px;
        height: auto;
        /* border: 2px solid red; */
        box-shadow: 0 0 30px 10px gainsboro;
        border-radius: 5px;
        margin: 20px 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
     
    .login-card-container a
    {
        width: 100%;
        height: auto;
        text-align: center;
    }
    .login-card-container a img
    {
        width: 40%;
        height: auto;
    }

    .login-card
    {
        width: 100%;
        height: 100%;
        /* border: 2px solid green; */
    }

    .login-header
    {
        width: 100%;
        height: auto;
        /* border: 2px solid pink; */
        padding: 15px 0;
        display: flex;
        justify-content: center;
    }

    .login-header h1
    {
        width: max-content;
        text-align: center;
        font-family: 'Geologica';
        font-size: 20px;
        font-weight: 500;
        border-bottom: 2px solid #45359e;
        color: #45359e;
    }

    .login-body
    {
        width: 100%;
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .input-container
    {
        width: 90%;
        height: 50px;
        /* border: 2px solid red; */
        margin-bottom: 10px;
        display: flex;
        justify-content: center;
    }
    .forget-container
    {
        width: 90%;
        height: 50px;
        /* border: 2px solid red; */
        margin-bottom: 10px;
        display: flex;
        justify-content: right;
    }

    .input-container input
    {
        width: 100%;
        height: 100%;
        outline: none;
        border: 1px solid #45359e40;
        font-size: 1rem;
        padding: 0 10px;
        transition: all .2 ease-in;
    }

    .input-container input:focus
    {
        width: 100%;
        height: 100%;
        outline: none;
        border: 1px solid #45359e;
        font-size: 1rem;
        padding: 0 10px;
    }

    .input-container input[type='submit']
    {
        width: max-content;
        height: max-content;
        outline: none;
        border: 1px solid #45359e;
        background-color: #45359e;
        color: #fff;
        border-radius: 5px;
        font-size: 1.05rem;
        letter-spacing: .05rem;
        padding: 8px 20px;
        cursor: pointer;
        transition: all .2s ease-in;
    }
    .input-container input[type='submit']:hover
    {
        border: 1px solid #45359e;
        background-color: #fff;
        color: #45359e;
    }

    .forget-container a 
    {
        width: max-content;
        height: max-content;
        text-decoration: none;
        font-family: Geologica;
        font-weight: 100;
        color: #45359e;
    }

    .forget-container a:hover
    {
        border-bottom: 1px solid #45359e;
    }

    .input-container a 
    {
        width: max-content;
        height: max-content;
        text-decoration: none;
        font-family: Geologica;
        font-weight: 200;
        color: #45359e;
    }
    .input-container a:hover
    {
        border-bottom: 1px solid #45359e;
    }

    </style>
</head>
<body>
    <div class="container">
        <div class="login-card-container">
            <a href="index.php">
                <img src="assets/images/logo.png" alt="">
            </a>
            <form action="" method="POST" class="login-card">
                <div class="login-header">
                    <h1>LOGIN</h1>
                </div>
                <div class="login-body">
                    <div class="input-container">
                        <input type="email" placeholder="Email" id="email" name="email">
                    </div>

                    <div class="input-container">
                        <input type="password" placeholder="Password" id="password" name="password">
                    </div>

                    <div class="forget-container">
                        <a href="javascript:void();">forgot password?</a>
                    </div>
                    <div class="input-container">
                        <input type="submit" id="login-submit" name="login-submit">
                    </div>
                    <div class="input-container">
                        <a href="signup.php">Don't have Account? Sign up</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        function validateSignUpForm()
        {
            let email=document.getElementById('email').value;
            let password=document.getElementById('password').value;
            console.log(email, password);

            if(email==='')
            {
                alert('Please Enter Your Email');
                return false;

            }
            else if(!validateEmail(email))
            {
                alert('Please Enter Valid Email');
                return false;

            }
            else if(password==='')
            {
                alert('Please Enter Password');
                return false;

            }
            else
            {
                return true;
            }

        }

    //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    // function coding area 
    //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

        // function for validating email
		function validateEmail(email) {
			let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
			return emailRegex.test(email);
		}

		// function for validate the name 
		function validateName(name) {
			const regex = /\d/;
			if (regex.test(name)) {
				return false;
			}
			return true;
		}

		//function to validate the num,ber
		function isValidNumber(str) {
			var numberPattern = /@[-+]?\d+(\.\d+)?$/;
			return numberPattern.test(str);
		}

		// Helper function to validate pincode format
		function isValidPinCode(pincode) {
			var pincodeRegex = /^\d{6}$/;
			return pincodeRegex.test(pincode);
		}

		// function for validate the mobile number 
        function validateMobileNumber(mobileNumber) {
            const regex = /^[0-9]{10}$/;
            if (regex.test(mobileNumber)) {
                return true;
            }
            return false;
        }
    </script>

</body>
</html>