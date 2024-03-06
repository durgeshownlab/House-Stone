<?php

    include('config/config.php');

    if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_type']))
    {
        echo '<script>location.href = "index.php";</script>';
    }

    if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && ($_SESSION['user_type']=='customer' || $_SESSION['user_type']=='dealer'))
    {
        echo '<script>location.href = "index.php";</script>';
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Latte Stone</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- bootstrap css cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- google font cdn  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100;200;300;400;500;600;700;800;900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Orbitron:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    
    <!-- font awesome cdn link -->
    <script src="https://kit.fontawesome.com/ca7271c9b6.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>


<!-- code for modal  -->

<div class="modal fade" id="updateTransactionModal" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" bis_skin_checked="1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" bis_skin_checked="1">
    <div class="modal-content" bis_skin_checked="1">
      <div class="modal-header" bis_skin_checked="1">
        <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Update Transaction</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" bis_skin_checked="1">
        <div class="input-group my-3">
            <span class="input-group-text" >Transaction Id</span>
            <input type="text" aria-label="First name" class="form-control" id="transaction-id" name="transaction-id">
        </div>
      </div>
      <div class="modal-footer" bis_skin_checked="1">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success update-transaction-status-btn">Update Status</button>
      </div>
    </div>
  </div>
</div>



<!-- code for navbar section  -->

<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark c-navbar position-sticky top-0 start-0" style="z-index: 99 !important;">
  <div class="container-fluid ">
    <a class="navbar-brand" href="admin.php">Latte <span style="color: #45359e;">Stone<span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin.php"><i class='bx bxs-home-alt-2 px-2'></i>Home</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="#" id="coupons-tab"><i class='bx bxs-purchase-tag px-2' ></i>Coupons</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-wallet-alt px-2'></i>Transactions</a>
          <ul class="dropdown-menu">    
            <li><a class="dropdown-item" id="pending-transaction-tab" href="#"><i class='bx bxs-time px-2'></i>Pending</a></li>
            <li><a class="dropdown-item" id="success-transaction-tab" href="#"><i class='bx bxs-badge-check px-2'></i>Success</a></li>
          </ul>
        </li>
        <li class="nav-item" >
          <a class="nav-link text-danger" href="logout.php"><i class='bx bx-log-in-circle px-2' ></i>Logout</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" id="search-box" placeholder="Search" aria-label="Search" data-tab-name="home">
        <button class="btn btn-outline-success d-flex align-items-center" type="submit" id="search-btn">
            <i class='bx bx-search bx-tada pe-2' ></i>
            <span>Search</span>
        </button>
      </form>
    </div>
  </div>
</nav>

<div class="container data-mount">

    <!-- for header and bredcrumb  -->
    <div class="row mt-3">
        <div class="col col-xsm-12">
            <h1 class="fs-3">Dashboard</h1>
        </div>

        <div class="col col-xsm-12 d-flex justify-content-end">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>

    
    <!-- for counts information  -->
    
    <div class="row">

        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xsm-12 p-2">
            <div class="card border border-success bg-success-subtle">
                <div class="card-body">
                    <h5 class="card-title text-success">Total Users</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary text-grey">All</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <i class="fa-solid fa-users fs-1 text-success"></i>
                        <p class="card-text text-success fs-1 text-end total-user-count" style="font-family: Orbitron;"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xsm-12 p-2">
            <div class="card border border-primary bg-primary-subtle">
                <div class="card-body">
                    <h5 class="card-title text-primary">New Users</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary text-grey">Today</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <i class="bx bxs-user fs-1 text-primary"></i>
                        <p class="card-text text-primary fs-1 text-end today-user-count" style="font-family: Orbitron;"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xsm-12 p-2">
            <div class="card border border-success bg-success-subtle">
                <div class="card-body">
                    <h5 class="card-title text-success">Payment Settled</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary text-grey text-opacity-75">All</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <i class='bx bxs-credit-card fs-1 text-success'></i>
                        <p class="card-text text-success fs-1 text-end payment-settled-count" style="font-family: Orbitron;"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xsm-12 p-2">
            <div class="card border border-warning bg-warning-subtle">
                <div class="card-body">
                    <h5 class="card-title text-warning">Transaction Request</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary text-grey text-opacity-75">Today</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <i class='bx bxs-bank fs-1 text-warning'></i>
                        <p class="card-text text-warning fs-1 text-end transaction-request-count" style="font-family: Orbitron;"></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-4  col-md-4 col-sm-6 col-xsm-12 p-2">
            <div class="card border border-danger bg-danger-subtle">
                <div class="card-body">
                    <h5 class="card-title text-danger">Expired Coupon</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">All</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <i class="bx bxs-tag-x fs-1 text-danger"></i>
                        <p class="card-text text-danger fs-1 text-end expired-coupon-count" style="font-family: Orbitron;"></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xsm-12 p-2">
             <div class="card border border-success bg-success-subtle">
                 <div class="card-body">
                     <h5 class="card-title text-success">Available Coupon</h5>
                     <h6 class="card-subtitle mb-2 text-body-secondary">All</h6>
                     <div class="d-flex justify-content-between align-items-center">
                         <i class="bx bxs-purchase-tag fs-1 text-success"></i>
                         <p class="card-text text-success fs-1 text-end available-coupon-count" style="font-family: Orbitron;"></p>
                     </div>
                 </div>
             </div>
        </div>
        
    </div>
        
</div>

<!-- bootstrap cdn link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- jquery cdn link  -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        console.log('logging.....');
        let page=1;
        let isLoading=false;
        let isEnd=true;


        // initial function calling area 
        getCount();

        // -------------------------------------------------------
        // code for tab in page 
        // -------------------------------------------------------

        // when click on coupons tab 
        $(document).on('click', '#coupons-tab', function(e){
            console.log('coupons tab clicked');
            $('#search-box').attr('data-tab-name', 'coupons-tab');    
            page=1;
            isEnd=false; 
            loadCouponsData();                   
        });

        // when click on pendding transaction tab 
        $(document).on('click', '#pending-transaction-tab', function(e){
            console.log('pending transaction tab clicked');
            $('#search-box').attr('data-tab-name', 'pending-transaction-tab');
            loadPendingTransactionsData();
        });

        // when click on success transaction tab 
        $(document).on('click', '#success-transaction-tab', function(e){
            console.log('success transaction tab clicked');
            $('#search-box').attr('data-tab-name', 'success-transaction-tab');
            loadSuccessTransactionsData();
        });


        // ---------------------------------------------------------
        // code for other event listener 
        // ---------------------------------------------------------

        // code for copy the text on click of a update button 
        $(document).on('click', '.update-transaction-btn', function(e){
            let c_t_id=$(this).attr('data-transaction-id');
            navigator.clipboard.writeText(c_t_id);
        });

        // code for when click on update status btn in modal 
        $(document).on('click', '.update-transaction-status-btn', function(e){
            
            let transaction_id=$('#transaction-id').val();
            console.log(transaction_id)
            let tab_name=$('#search-box').attr('data-tab-name');

            if(transaction_id==='')
            {
                alert('Please Enter Transaction Id');
            }
            else
            {
                if(confirm('Are You Sure? You Want To Update The Transaction Status'))
                {
                    $.ajax({
                        url: 'adminApi/updateTransactionStatusApi.php',
                        type: 'POST',
                        data: {transaction_id: transaction_id},
                        success: function(data)
                        {
                            $('#transaction-id').val('');
                            $('#updateTransactionModal').modal('hide');

                            if(data==0)
                            {
                                alert('failed to update status');
                                if(tab_name==='pending-transaction-tab')
                                {
                                    loadPendingTransactionsData();
                                }
                                else if(tab_name==='success-transaction-tab')
                                {
                                    loadSuccessTransactionsData();

                                }
                            }
                            else if(data==1)
                            {
                                // alert('Status updated Successfully');
                                if(tab_name==='pending-transaction-tab')
                                {
                                    loadPendingTransactionsData();
                                }
                                else if(tab_name==='success-transaction-tab')
                                {
                                    loadSuccessTransactionsData();
                                }
                            }
                            else
                            {
                                alert('Something went wrong, check the log');
                                console.log(data)
                                if(tab_name==='pending-transaction-tab')
                                {
                                    loadPendingTransactionsData();
                                }
                                else if(tab_name==='success-transaction-tab')
                                {
                                    loadSuccessTransactionsData();
                                }
                            }
                        }
                    })
                }
            }

        });

        //when click on generate coupons btn
        $(document).on('click', '#generate-coupons-btn', function(){
            let no_of_coupons=$('#no-of-coupons').val();
            let ammount=$('#ammount').val();
            if(no_of_coupons=='')
            {
                alert('Please Enter No of Coupons');
            }
            else if(isNaN(no_of_coupons))
            {
                alert('No. of Coupons Must Be Numeric Value');
            }
            else if(no_of_coupons<=0)
            {
                alert('No. of Coupons Must Be Greater Than 0');
            }
            else if(ammount=='')
            {
                alert('Please Enter Ammount');
            }
            else if(isNaN(ammount))
            {
                alert('Ammount Must Be Numeric Value');
            }
            else if(ammount<=0)
            {
                alert('Please Enter Ammount Greater Than 0');
            }
            else
            {
                showLoader();
                $.ajax({
                    url: 'adminApi/generateCouponsApi.php',
                    type: 'POST', 
                    data: {no_of_coupons: no_of_coupons, ammount: ammount},
                    success: function(data){
                        // alert(data)
                        if(data==0)
                        {
                            page=1;
                            // isLoading=true;
                            isEnd=false;
                            loadCouponsData();
                        }
                        else if(data==1)
                        {
                            page=1;
                            isEnd=false;
                            loadCouponsData();
                        }
                        else
                        {
                            alert(data);
                        }
                    }
                })
            }
        });

        // when scroll to down info will be load
        $(window).on('scroll', function() {

            let tab_name=$('#search-box').attr('data-tab-name');

            if ($(window).scrollTop() + $(window).height() === $(document).height()) {
                // console.log("Scrolled to the bottom of the page!");
                if(tab_name==='coupons-tab')
                {
                    loadCoupon();
                }
                else if(tab_name==='pending-transaction-tab')
                {
                    loadPendingTransactions();
                }
                else if(tab_name==='success-transaction-tab')
                {
                    loadSuccessTransactions();
                }
            }
        });

        // code for on change on the filter button 
        $(document).on('change', 'input[name="status"]', function() {
            console.log('object')
            loadCouponsData();
        });

        // code for when click on search button 
        $(document).on('click', '#search-btn', function(e){
            e.preventDefault();

            let tab_name=$('#search-box').attr('data-tab-name');
            console.log(tab_name);

            let search_data=$('#search-box').val();

            if(search_data!='')
            {
                if(tab_name==='coupons-tab')
                {
                    console.log(search_data);
                    $.ajax({
                        url: 'adminApi/searchCouponsApi.php',
                        type: 'POST',
                        data: {search_data, search_data},
                        success: function(data){
                            console.log(data);
                            $('.coupons-data-mount').html(data);
                        }
                    });
                }
                else if(tab_name==='pending-transaction-tab')
                {
                    console.log(search_data);
                    $.ajax({
                        url: 'adminApi/searchTransactionsApi.php',
                        type: 'POST',
                        data: {search_data, search_data},
                        success: function(data){
                            console.log(data);
                            $('.data-mount').html(data);
                        }
                    });
                }
                else if(tab_name==='success-transaction-tab')
                {
                    console.log(search_data);
                    $.ajax({
                        url: 'adminApi/searchTransactionsApi.php',
                        type: 'POST',
                        data: {search_data, search_data},
                        success: function(data){
                            console.log(data);
                            $('.data-mount').html(data);
                        }
                    });
                }

            }
        });

        // ----------------------------------------------
        // fucnton coding area 
        // ----------------------------------------------

        // function for loading all success transactions 
        function loadSuccessTransactionsData()
        {
            page=1;
            isLoading=true;
            isEnd=false; 

            showLoader();

            $.ajax({
                url: 'adminApi/getSuccessTransactionsApi.php',
                type: 'POST',
                data: {page: page},
                success: function(data){
                    // console.log(data);
                    console.log('first time Success transaction loading');
                    $('.data-mount').html(data);
                    page++;
                    isLoading=false;
                }
            });
        } 


        function loadSuccessTransactions()
        {
            if(!isLoading && !isEnd)
            {
                $('.more-coupons-loader').removeClass('hide-loader');
                isLoading=true;

                $.ajax({
                    url: 'adminApi/getSuccessTransactionsApi.php',
                    type: 'POST',
                    data: {page: page},
                    success: function(data){
                        if(data=='')
                        {
                            isEnd=true;
                            $('.more-coupons-loader').addClass('hide-loader');
                        }
                        else
                        {
                            console.log('scroll loading ', page);
                            $('.coupons-data-mount').append(data);
                            page++;
                            isLoading=false;
                            $('.more-coupons-loader').addClass('hide-loader');
                        }
                    }
                });
            }
        }
        // function for loading all pending transactions 
        function loadPendingTransactionsData()
        {
            page=1;
            isLoading=true;
            isEnd=false; 

            showLoader();

            $.ajax({
                url: 'adminApi/getPendingTransactionsApi.php',
                type: 'POST',
                data: {page: page},
                success: function(data){
                    // console.log(data);
                    console.log('first time pending transaction loading');
                    $('.data-mount').html(data);
                    page++;
                    isLoading=false;
                }
            });
        } 


        function loadPendingTransactions()
        {
            if(!isLoading && !isEnd)
            {
                $('.more-coupons-loader').removeClass('hide-loader');
                isLoading=true;

                $.ajax({
                    url: 'adminApi/getPendingTransactionsApi.php',
                    type: 'POST',
                    data: {page: page},
                    success: function(data){
                        if(data=='')
                        {
                            isEnd=true;
                            $('.more-coupons-loader').addClass('hide-loader');
                        }
                        else
                        {
                            console.log('scroll loading ', page);
                            $('.coupons-data-mount').append(data);
                            page++;
                            isLoading=false;
                            $('.more-coupons-loader').addClass('hide-loader');
                        }
                    }
                });
            }
        }


        // function for getting all the user
        function getCount()
        {
            $.ajax({
                url: 'adminApi/getCountApi.php',
                type: 'POST',
                data: {},
                success: function(data){
                    data=JSON.parse(data);

                    $.each(data, function(index, item){
                        console.log(item);
                        if(item.field_name==='total_users')
                        {
                            $('.total-user-count').text(item.count);
                        }
                        else if(item.field_name==='today_users')
                        {
                            $('.today-user-count').text(item.count);
                        }
                        else if(item.field_name==='payment_settled')
                        {
                            $('.payment-settled-count').text(item.count);
                        }
                        else if(item.field_name==='transaction_request')
                        {
                            $('.transaction-request-count').text(item.count);
                        }
                        else if(item.field_name==='expired_coupon')
                        {
                            $('.expired-coupon-count').text(item.count);
                        }
                        else if(item.field_name==='available_coupon')
                        {
                            $('.available-coupon-count').text(item.count);
                        }
                    });


                    console.log(data)                    
                    
                }
            })
        }

        // function for getting coupons 
        function loadCouponsData()
        {
            
            var status = [];
            
            $('input[name="status"]:checked').each(function() {
                status.push($(this).val());
            });
            
            console.log("Checked Values:", status);
            
            if(status.length===0)
            {
                page=1;
                isLoading=true;
                isEnd=false; 

                showLoader();

                $.ajax({
                    url: 'adminApi/getCouponDataApi.php',
                    type: 'POST',
                    data: {page: page},
                    success: function(data){
                        // console.log(data);
                        console.log('first time data loading');
                        $('.data-mount').html(data);
                        page++;
                        isLoading=false;
                    }
                });
            }
            else
            {
                page=1;
                isEnd=false; 

                $.ajax({
                    url: 'adminApi/sortFilterCouponsApi.php',
                    type: 'POST',
                    data: {page: page, status: status},
                    success: function(data){
                        // console.log(data);
                        console.log('first time data loading on fileter');
                        $('.coupons-data-mount').html(data);
                        page++;
                        isLoading=false;
                    }
                });
            }
        }

        function loadCoupon()
        {
            if(!isLoading && !isEnd)
            {
                $('.more-coupons-loader').removeClass('hide-loader');
                isLoading=true;

                var status = [];

                $('input[name="status"]:checked').each(function() {
                status.push($(this).val());
                });

                console.log("Checked Values:", status);


                if(status.length===0)
                {
                    $.ajax({
                        url: 'adminApi/getCouponDataApi.php',
                        type: 'POST',
                        data: {page: page},
                        success: function(data){
                            if(data=='')
                            {
                                isEnd=true;
                                $('.more-coupons-loader').addClass('hide-loader');
                            }
                            else
                            {
                                console.log('scroll loading ', page);
                                $('.coupons-data-mount').append(data);
                                page++;
                                isLoading=false;
                                $('.more-coupons-loader').addClass('hide-loader');
                            }
                        }
                    });
                }
                else
                {
                    $.ajax({
                        url: 'adminApi/sortFilterCouponsApi.php',
                        type: 'POST',
                        data: {page: page, status: status},
                        success: function(data){
                            if(data=='')
                            {
                                isEnd=true;
                                $('.more-coupons-loader').addClass('hide-loader');
                            }
                            else
                            {
                                console.log('scroll loading ', page);
                                $('.coupons-data-mount').append(data);
                                page++;
                                isLoading=false;
                                $('.more-coupons-loader').addClass('hide-loader');
                            }
                        }
                    });
                }

            }
        }

        // function for loading animation 
        function showLoader()
        {
            $('.data-mount').html(`
            <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            `);
        }


    });
</script>
</body>
</html>