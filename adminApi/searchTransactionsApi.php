<?php

include('../config/config.php');

// if(!isset($_POST['search_data']) || empty($_POST['search_data']))
// {

// }

$search_data=mysqli_real_escape_string($con, $_POST['search_data']);

$output ='';

$output .= '
<div class="row mt-3">
    <div class="col col-xsm-12">
        <h1 class="fs-3">Transactions Search Result</h1>
    </div>

    <div class="col col-xsm-12 d-flex justify-content-end">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="8" height="8"%3E%3Cpath d="M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z" fill="%236c757d"/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="admin.php" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pending Transactions</li>
            </ol>
        </nav>
    </div>
</div>  
';

// for total coupons 
$sql="select * from transactions where account_number like '%{$search_data}%' order by timestamp desc";
$result=mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{

    $output .='
    <div class="container-fluid overflow-auto p-0">

        <table class="table table-striped table-bordered">
            <thead class="table-dark position-sticky top-0 start-0">
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Ammount</th>
                    <th scope="col">Bank Name</th>
                    <th scope="col">A/C Number</th>
                    <th scope="col">IFSC Code</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <tbody class="table-group-divider coupons-data-mount">
    ';

    
            
            
    $i=1;       

    while($row=mysqli_fetch_assoc($result))
    {
        $output .='
        <tr class="';
        
        if($row['status']=='pending')
        {
            $output .=' table-warning';
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
            <td>'.ucwords(strtolower($row['name'])).'</td>
            <td>'.$row['ammount'].'</td>
            <td>'.strtoupper($row['bank_name']).'</td>
            <td>'.strtoupper($row['account_number']).'</td>
            <td>'.strtoupper($row['ifsc_code']).'</td>
            <td class="d-flex justify-content-between">'.ucwords($row['status']).'';
        
        if($row['status']=='pending')
        {
            $output .='<button class="btn btn-success btn-sm update-transaction-status-btn" data-id="'.$row['id'].'">Update</button>';
        }    
            
        $output .= '</td>
            ';
        

        $output .='
        </tr>
        ';
    }


    $output .=' 
            </tbody>
        </table>

    </div>

    <div class="p-4 more-coupons-loader hide-loader" style="display: flex; justify-content: center; ">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    ';
    
}
    

echo $output;

?>