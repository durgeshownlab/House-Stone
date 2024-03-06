<?php 
include('../config/config.php');

$sql="select * from transactions where user_id={$_SESSION['user_id']} order by timestamp desc";

$result=mysqli_query($con, $sql);

$output = '';

if(mysqli_num_rows($result)>0)
{
    $output .= '
    <div class="table-container">
        <table>
            <tr>
                <th colspan="6" class="payment-heading">Payment History</th>
            </tr>
            <tr>
                <th>S.no</th>
                <th>Transaction Id</th>
                <th>Bank Name</th>
                <th>Name</th>
                <th>Ammount</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
    ';
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {

        $output .= '
        <tr>
            <td>'.$i++.'</td>
            <td>'.strtoupper($row['transaction_id']).'</td>
            <td>'.strtoupper($row['bank_name']).'</td>
            <td>'.ucwords(strtolower($row['name'])).'</td>
            <td>'.$row['ammount'].'</td>';
        
        if($row['status']=='pending')
        {
            $output .='<td><i class="bx bxs-time status-pending"></i>Pending</td>';
        }
        else if($row['status']=='success')
        {
            $output .='<td><i class="bx bxs-badge-check status-success"></i>Success</td>';
        }

        $output .='
            <td>'.date_format(date_create($row['timestamp']), 'd F Y').'</td>
        </tr>
        ';
    }
    $output .= '
        </table>
    </div>
    ';
    
}
else
{
    $output .='
        <div class="nothing-poster">
            <img src="assets/images/banner/nothing.png" alt="">
            <p>Not Made Any Transactions Yet!</p>
        </div>
    ';
}

echo $output;



?>