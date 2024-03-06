<?php

include('../config/config.php');

$page=$_POST['page']??1;
$limit=20;

$offset = ($page-1)*$limit;
// $i=($page*$limit);
$output ='';

if($page==1)
{
    $output .= '
    <div class="row mt-3">
        <div class="col col-xsm-12">
            <h1 class="fs-3">Coupons</h1>
        </div>
    
        <div class="col col-xsm-12 d-flex justify-content-end">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="8" height="8"%3E%3Cpath d="M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z" fill="%236c757d"/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Coupons</li>
                </ol>
            </nav>
        </div>
    </div>  
    
    <div class="container-fluid p-0">
        <div class="my-2 d-flex">
            <div class="me-2">
                <input type="number" class="form-control-plaintext border p-2" id="no-of-coupons" value="" placeholder="Number of Coupons" min="1">
            </div>
            <div class="me-2">
                <input type="number" class="form-control-plaintext border p-2" id="ammount" value="" placeholder="Ammount" min="1">
            </div>
            <button class="btn btn-primary d-flex align-items-center" type="button" id="generate-coupons-btn"><i class="bx bxs-dice-5 bx-tada pe-2 fs-4" ></i>Generate Coupon</button>
        </div>
    </div>
    
    <div class="container-fluid p-0">
        <div class="my-2 d-flex">
            
            <div class="me-2 d-flex align-items-center">
                <p>Filter By</p>
            </div>
            <div class="me-2">
                <input type="checkbox" class="btn-check" id="status-available" name="status" autocomplete="off" value="0">
                <label class="btn btn-outline-primary" for="status-available">Available</label>
            </div>
            <div class="me-2">
                <input type="checkbox" class="btn-check" id="status-expired" name="status" autocomplete="off" value="1">
                <label class="btn btn-outline-primary" for="status-expired">Expired</label>
            </div>
        </div>
    </div>
    ';
    
    // for total coupons 
    $sql="select * from coupons order by timestamp desc limit {$offset}, {$limit}";
    $result=mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0)
    {
    
        $output .='
        <div class="container-fluid overflow-auto p-0">
    
            <table class="table table-striped table-bordered">
                <thead class="table-dark position-sticky top-0 start-0">
                    <tr class="">
                        <th scope="col">#</th>
                        <th scope="col">Coupon Code</th>
                        <th scope="col">Ammount</th>
                        <th scope="col">Date</th>
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
                <td>'.$row['ammount'].'</td>
                <td>'.date('d-m-Y', strtotime($row['timestamp'])).'</td>
                ';
    
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
    
}
else
{
    $sql="select * from coupons order by timestamp desc limit {$offset}, {$limit}";
    $result=mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0)
    {               
        $i=(($page-1)*$limit)+1;       
    
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
                <td>'.$row['ammount'].'</td>
                <td>'.date('d-m-Y', strtotime($row['timestamp'])).'</td>
                ';
    
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
}

echo $output;

?>