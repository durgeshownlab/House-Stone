<?php 
include('../config/config.php');

$sql="select redeemed_points from users where id={$_SESSION['user_id']}";

$result=mysqli_query($con, $sql);


if(mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);
    echo '<i class="bx bxs-coin"></i> '.$row['redeemed_points'];
}

?>