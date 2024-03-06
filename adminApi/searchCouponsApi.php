<?php

include('../config/config.php');

$output ='';


if(isset($_POST['search_data']))
{
    $search_data=$_POST['search_data'];
}

// for total coupons 
$sql="select * from coupons where coupon_code like '%".$search_data."%'";

$result=mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{               
    $i=1;       

    while($row=mysqli_fetch_assoc($result))
    {
        $output .='
        <tr class="';
        
        if($row['is_used']==1)
        {
            $output .=' table-danger';
        }
        else{
            $output .=' table-success';
        }
        
        $output .='">
            <th>'.$i++.'';
            
        
        if(date('Y-m-d', strtotime($row['timestamp'])) === date('Y-m-d'))
        {

            $output .='<span class="badge text-bg-success ms-3 fw-lighter">New</span>';
        }

        
        
        $output .='</th>';

        

        $output .='
            <td class="';

        if($row['is_used']==1)
        {
            $output .=' text-decoration-line-through';
        }
            
        $output .='">'.$row['coupon_code'].'</td>
            <td>'.$row['ammount'].'</td>';

        if($row['is_used']==1)
        {
            $output .='
            <td><span class="d-inline-block p-1 bg-danger border rounded" ></span> Expired</td>
            ';
        }
        else
        {
            $output .='
            <td> <span class="d-inline-block p-1 bg-success border rounded" ></span> Available</td>
            ';
        }

        $output .='
        </tr>
        ';
    }

}

echo $output;

?>